<?php

namespace App\Repositories\SendMail;

use App\Repositories\RepositoryInterface;

interface SendMailRepositoryInterface extends RepositoryInterface
{
    //
    public function getAdminEmailByKeySend();

    public function updateKeySend($admin_email);
}
