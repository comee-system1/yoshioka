<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->title = $data['title'];
        $this->body = $data['body'];
        $this->address = $data['address'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info(date('Y-m-d H:i:s').'タイトル::'.$this->title);
        Log::info(date('Y-m-d H:i:s').'本文::'.$this->body);
        Log::info(date('Y-m-d H:i:s').'メールアドレス::'.$this->address);
        Log::info("----------------------------------------------------------");

        //return $this->view('view.name');
        return $this->to($this->address)
        ->subject($this->title)
        ->view('registers.register_mail')
        ->with(['body' => $this->body]);
    }
}
