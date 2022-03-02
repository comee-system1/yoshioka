<?php

namespace App\Console\Commands;

use App\Consts\ClassConsts;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;
use App\Models\Account;
use App\Models\Information;
use App\Models\DefineMail;

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

        $this->info('Mail Send All User Start');


        Log::info("一斉メール開始");
        $infomations = Information::getSendAllData();
        foreach($infomations as $i => $value){
            $mail = DefineMail::getData($value->seminer_id, 'information');
            $this->title = $value->title;
            $this->body = DefineMail::textReplaceInformation($mail->body, $value);
            $this->address = $value->email;
            Mail::raw($this->body, function($message) use ($i)
            {

                Log::info(date('Y-m-d H:i:s').'タイトル::'.$this->title);
                Log::info(date('Y-m-d H:i:s').'本文::'.$this->body);
                Log::info(date('Y-m-d H:i:s').'メールアドレス::'.$this->address);
                Log::info("----------------------------------------------------------");

                $message->from(ClassConsts::ADMIN_MAIL);
                $message->to($this->address)->subject($this->title);
            });
        }

        Log::info("一斉メール終了");
        $this->info('Mail Send All User End');
        Information::where('type', 2)->where('send_flag',0)->update(['send_flag' => 1]);
    }
}
