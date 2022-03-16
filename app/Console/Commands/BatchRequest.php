<?php

namespace App\Console\Commands;

use App\Models\DefineMail;
use App\Models\Seminer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Consts\ClassConsts;

class BatchRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:requests {daytype}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'セミナーの3日前と当日になった際に参加者にメールを送信';

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

        $this->info('Mail Send Request User Start');
        $daytype = $this->argument('daytype');
        $definemail = DefineMail::getDefineRequestMail($daytype);
        $accounts = Seminer::getRequestMail($daytype);
        foreach($accounts as $i => $value){

            $this->title = ($value->language_status == 2)?$definemail[$value->seminer_id][ 'subject2' ]:$definemail[$value->seminer_id][ 'subject' ];
            $body = ($value->language_status == 2)?$definemail[$value->seminer_id][ 'body2' ]:$definemail[$value->seminer_id][ 'body' ];
            $this->body = DefineMail::textReplaceInformation($body,$value);
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
        $this->info('Mail Send Request User End');
        return 0;
    }
}
