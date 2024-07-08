<?php

namespace App\Http\Controllers;
use App\Models\MessageModel;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(){
        $messages = MessageModel::all();

        // Fetch the latest chat ID from the database
        $latestMessage = MessageModel::orderBy('created_at', 'desc')->first();
        $latestChatId = $latestMessage ? $latestMessage->chat_id : null;

        return view('index', compact('messages', 'latestChatId'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'content' => 'required|string',
            'chat_id' => 'required|string',
        ]);

        // Store the message in the database
        MessageModel::create([
            'content' => $validated['content'],
            'chat_id' => $validated['chat_id'],
            'incoming' => 0,
        ]);

        $telegramToken = env('TELEGRAM_BOT_TOKEN');
        $chatId = $validated['chat_id'];

        $client = new Client(['base_uri' => 'https://api.telegram.org/bot' . $telegramToken . '/']);
        
        $response = $client->post('sendMessage', [
            'json' => [
                'chat_id' => $chatId,
                'text' => $validated['content'],
            ],
        ]);

        return redirect('/');
    }

    public function handle(Request $request){
        $update = $request->all();

        // Ensure this is a message update
        if (isset($update['message'])) {
            $message = $update['message']['text'];
            $chatId = $update['message']['chat']['id'];

            // Store received message in the database
            MessageModel::create([
                'content' => $message,
                'chat_id' => $chatId,
                'incoming' => 1, // Incoming message flag
            ]);
        }

        // Respond to Telegram 
        return response()->json(['status' => 'ok']);
    }

    
    
}
