#include "DHT.h"
#include <WiFi.h>
#include <HTTPClient.h>

#define DHTPIN 2        // Port DHT22
#define DHTTYPE DHT22
#define MQ2PIN 32       // Port MQ2
#define MQ135PIN 33     // Port MQ135
const int pinAnalog = 34;  // Port PM2.5
#define BUZZER_PIN 26   // Port buzzer

DHT dht(DHTPIN, DHTTYPE);

const char* ssid = "Kost Sidorame 12";
const char* password = "Barokah99";
const char* serverUrl = "https://airsense.airquality.my.id/sensor";
const char* apiKey = "23145-ECDBA-78609-GIJFH";

// Variabel untuk interval pengiriman
unsigned long normalInterval = 600000;  // 10 menit
unsigned long dangerInterval = 60000;   // 1 menit
unsigned long previousMillis = 0;       // Waktu terakhir data dikirim
bool lastDangerState = false;           // Menyimpan status bahaya sebelumnya

void setup() {
  Serial.begin(9600);
  WiFi.begin(ssid, password);
  pinMode(BUZZER_PIN, OUTPUT);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("\nConnected to WiFi!");
  for (int i = 0; i < 2; i++) {
    digitalWrite(BUZZER_PIN, HIGH);
    delay(200);
    digitalWrite(BUZZER_PIN, LOW);
    delay(200);
  }

  dht.begin();
}

void loop() {
  unsigned long currentMillis = millis();

  // Cek koneksi WiFi
  if (WiFi.status() != WL_CONNECTED) {
    Serial.println("WiFi Disconnected, reconnecting...");
    WiFi.reconnect();
    delay(5000);
    return;
  }

  // Pembacaan sensor PM2.5
  int pm25_raw = analogRead(pinAnalog);
  float pm25_voltage = pm25_raw * (5.0 / 7023.0);  // Konversi ADC ke Voltase (5V referensi)
  int pm25 = round(pm25_voltage * 100);  // Kalibrasi ke µg/m³ (sesuaikan jika perlu)

  // Pembacaan sensor DHT
  int suhu = dht.readTemperature();
  int kelembaban = dht.readHumidity();

  // Pembacaan sensor MQ2
  float MW_CO = 28.01;  // Berat molekul CO dalam g/mol
  float R = 0.0821;  // Konstanta gas ideal dalam L·atm/(mol·K)
  float P = 1.0;  // Tekanan atmosfer (diasumsikan 1 atm)
  float Vm = (R * (suhu + 273.15)) / P;
  float co_ppm = analogRead(MQ2PIN) * (5.0 / 6023.0); // Baca sensor MQ-2
  float co = co_ppm * (MW_CO / Vm);  // Konversi PPM ke µg/m³

  // Pembacaan sensor MQ135
  float tvoc_raw = analogRead(MQ135PIN);
  float tvoc = tvoc_raw * (5.0 / 20023.0);  // Konversi ADC ke Voltase (5V referensi)

  // Tampilkan data di Serial Monitor
  Serial.print("PM2.5: "); Serial.print(pm25); Serial.print("µg/m3 | ");
  Serial.print("CO: "); Serial.print(co); Serial.print("mg/m3 | ");
  Serial.print("TVOC: "); Serial.print(tvoc); Serial.print("ppm | ");
  Serial.print("Suhu: "); Serial.print(suhu); Serial.print("°C | ");
  Serial.print("Kelembaban: "); Serial.print(kelembaban); Serial.println("% | ");

  // Cek kondisi bahaya
  bool isDanger = (pm25 > 61 || co > 2.0 || tvoc > 0.66 || suhu > 36 || kelembaban > 99);
  unsigned long sendInterval = isDanger ? dangerInterval : normalInterval;

  // Jika ada perubahan status bahaya atau sudah waktunya mengirim data
  if (isDanger != lastDangerState || (currentMillis - previousMillis >= sendInterval)) {
    previousMillis = currentMillis;
    lastDangerState = isDanger; // Simpan status terakhir

    sendData(pm25, co, tvoc, suhu, kelembaban);

    // Jika dalam kondisi bahaya, nyalakan buzzer
    if (isDanger) {
      digitalWrite(BUZZER_PIN, HIGH);
      delay(2000);
      digitalWrite(BUZZER_PIN, LOW);
    }
  }

  delay(1000);  // Loop tetap berjalan tanpa mengganggu pembacaan data
}

// Fungsi untuk mengirim data ke server
void sendData(int pm25, float co, float tvoc, int suhu, int kelembaban) {
  HTTPClient http;
  http.begin(serverUrl);
  http.addHeader("Content-Type", "application/json");
  http.addHeader("X-API-KEY", apiKey);

  String jsonPayload = "{\"pm25\":" + String(pm25) + 
                       ",\"co\":" + String(co) + 
                       ",\"tvoc\":" + String(tvoc) + 
                       ",\"suhu\":" + String(suhu) + 
                       ",\"kelembaban\":" + String(kelembaban) + "}";

  int httpResponseCode = http.POST(jsonPayload);
  if (httpResponseCode > 0) {
    Serial.println("Data sent successfully!");
  } else {
    Serial.print("Error on sending POST: ");
    Serial.println(httpResponseCode);
  }
  http.end();
}
