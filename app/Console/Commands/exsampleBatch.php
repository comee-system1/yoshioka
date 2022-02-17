<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;

class exsampleBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:exsample';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an hourly email to all the users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $to = array('chiba@innovation-gate.jp','chiba@se-sendai.co.jp');
        // for($i=0;$i<=300;$i++){
        //     $mail = [];
        //     $mail['address'] = "chiba@se-sendai.co.jp";
        //     $mail['body'] = "おおおおおお";
        //     $mail['title'] = "えええええええええ".$i;
        //     Mail::send(new RegisterMail($mail));
        // }

        $this->info('Mail Send All User Start');

        Log::info("一斉メール開始");
        $this->title = "ええええ";
        $this->body = "ええええ";
        $this->address = "chiba@innovation-gate.jp";
        for($i=0;$i<=2;$i++){
            Mail::raw("ああああああああああああああああ".$i, function($message) use ($i)
            {

                Log::info(date('Y-m-d H:i:s').'タイトル::'.$this->title);
                Log::info(date('Y-m-d H:i:s').'本文::'.$this->body);
                Log::info(date('Y-m-d H:i:s').'メールアドレス::'.$this->address);
                Log::info("----------------------------------------------------------");

                $message->from('from@gmail.com');
                $message->to("chiba@se-sendai.co.jp")->subject('Hourly Update'.$i);
            });
        }
        Log::info("一斉メール終了");
        $this->info('Mail Send All User End');

    }
}
