<?php

$token = "7625428112:AAEKfnOYHJmtGclzAjMoma0qOjHC3m3_boo"; // Ganti dengan token bot Anda
$apiUrl = "https://api.telegram.org/bot$token/";

// Mendapatkan data dari webhook
$update = json_decode(file_get_contents("php://input"), TRUE);

// Cek apakah ada pesan
if (isset($update["message"])) {
    $chatId = $update["message"]["chat"]["id"];
    $messageText = $update["message"]["text"];

    // Cek apakah pesan adalah /start
    if ($messageText == "/start") {
        $responseMessage = "ID Chat Anda adalah: $chatId";
        sendMessage($chatId, $responseMessage);
    }
}

// Fungsi untuk mengirim pesan
function sendMessage($chatId, $text) {
    global $apiUrl;
    $url = $apiUrl . "sendMessage?chat_id=$chatId&text=" . urlencode($text);
    file_get_contents($url);
}
