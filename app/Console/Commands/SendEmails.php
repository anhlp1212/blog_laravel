<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Mail;
use App\Mail\SendMailBatch;
use App\Repositories\SendMail\SendMailRepository;

class SendEmails extends Command
{
    protected $sendMailRepo;

    public function __construct(SendMailRepository $sendMailRepo)
    {
        parent::__construct();
        $this->sendMailRepo = $sendMailRepo;
    }

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
    protected $description = 'Send mails every minute';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        Log::info(now() . ' ' .  $this->signature);
        $admin_emails = $this->sendMailRepo->getAdminEmailByKeySend();

        foreach ($admin_emails as $admin_email) {
            try {
                Mail::to($admin_email->admin_email)->send(new SendMailBatch());
                $this->sendMailRepo->updateKeySend($admin_email->admin_email);
            } catch (\Throwable $e) {
                Log::error('Run SendMails Failed:' . $e->getMessage());
                continue;
            }
        }
    }
}
