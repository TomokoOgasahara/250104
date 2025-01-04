<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserPassMail extends Mailable
{
    use Queueable, SerializesModels;

    public $link;

    public function __construct($link)
    {
        $this->link = $link;
    }

    public function build()
    {
        return $this->subject('パスワード設定のお知らせ')
                    ->view('user_touroku_kakunin')
                    ->with(['link' => $this->link]);
    }
}
