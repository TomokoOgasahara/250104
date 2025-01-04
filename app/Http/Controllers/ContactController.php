<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'email' => 'required|email',
        'tell' => 'required|string|max:20',
        'question' => 'required|string',
    ]);

    // メール送信
    Mail::send('/emails_contact', $validatedData, function ($message) use ($validatedData) {
        $message->to('womtech1216@gmail.com') // 宛先のGmailアドレス
                ->subject('お問い合わせフォームからのメッセージ');
        $message->from($validatedData['email'], $validatedData['name'], $validatedData['company'], $validatedData['tell'], $validatedData['question']);
    });

    return back()->with('success', 'お問い合わせ内容を送信しました！');
}
}
