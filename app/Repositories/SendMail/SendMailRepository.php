<?php

namespace App\Repositories\SendMail;

use App\Repositories\BaseRepository;
use App\Models\SendMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SendMailRepository extends BaseRepository implements SendMailRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return SendMail::class;
    }

    public function getAdminEmailByKeySend()
    {
        try {
            return $this->model
                ->select('admin_email')
                ->where('key_send', '=', 0)
                ->get();
        } catch (\Throwable $e) {
            Log::error('Run DeleteDuplicateData Failed:' . $e->getMessage());
        }
    }

    public function updateKeySend($admin_email)
    {
        try {
            DB::beginTransaction();

            $this->model
                ->where('admin_email', $admin_email)
                ->update(['key_send' => 1]);

            DB::commit();
        } catch (\Throwable $e) {
            Log::error('Run DeleteDuplicateData Failed:' . $e->getMessage());
            DB::rollBack();
        }
    }
}
