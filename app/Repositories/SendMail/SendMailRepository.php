<?php

namespace App\Repositories\SendMail;

use App\Repositories\BaseRepository;
use App\Models\SendMail;

class SendMailRepository extends BaseRepository implements SendMailRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return SendMail::class;
    }
}
