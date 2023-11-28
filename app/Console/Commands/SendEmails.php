<?php

namespace App\Console\Commands;

use App\Models\SendMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mail;
use App\Mail\SendMailBatch;
use App\Repositories\Post\PostRepository;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mails';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        try {
            $admin_emails = SendMail::select('admin_email')
                ->where('key_send', '=', 0)
                ->get();

            foreach ($admin_emails as $admin_email) {
                if (Mail::to($admin_email->admin_email)->send(new SendMailBatch())) {
                    DB::table('send_mail')
                        ->where('admin_email', $admin_email->admin_email)
                        ->update(['key_send' => 1]);
                }
            }
        } catch (\Throwable $e) {
            Log::error('Run SendMails Failed:' . $e->getMessage());
        }
    }
}
