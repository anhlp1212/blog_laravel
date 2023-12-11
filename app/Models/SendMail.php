<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMail extends Model
{
    use HasFactory;

    protected $table = 'send_mail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_email',
        'key_send',
    ];

    /**
     * @return BelongsToMany
     */

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
