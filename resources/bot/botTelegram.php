<?php
// Token bot Telegram Anda
$botToken = "7625428112:AAEKfnOYHJmtGclzAjMoma0qOjHC3m3_boo";
$website = "https://api.telegram.org/bot".$botToken;

// Ambil update dari Telegram
$update = file_get_contents("php://input");
$updateArray = json_decode($update, TRUE);

// Ambil informasi chat_id dan text yang dikirimkan pengguna
$chat_id = $updateArray["message"]["chat"]["id"];
$message = $updateArray["message"]["text"];

// Jika pengguna mengetik /start, bot akan mengirimkan chat_id ke pengguna
if($message == "/start"){
    $response = "Halo! Ini adalah chat ID Anda: " . $chat_id;
    
    // Kirim pesan balik ke pengguna
    file_get_contents($website."/sendMessage?chat_id=".$chat_id."&text=".urlencode($response));
}
?>
