<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TelegramController extends Controller
{
    public function index()
    {
        return view('botTelegram');
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $chatId = $request->input('chat_id');

        $client = new Client();
        $url = "https://api.telegram.org/bot" . env('7625428112:AAEKfnOYHJmtGclzAjMoma0qOjHC3m3_boo') . "/sendMessage";

        $response = $client->post($url, [
            'json' => [
                'chat_id' => $chatId,
                'text' => $message
            ]
        ]);

        return redirect()->route('botTelegram')->with('success', 'Message sent!');
    }
}
