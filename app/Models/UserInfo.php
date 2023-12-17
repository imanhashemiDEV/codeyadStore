<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'bank_card_number',
        'bank_account_number',
        'bank_shaba_number',
        'national_identity_number',
        'phone',
        'telegram',
        'whatsapp',
        'instagram',
        'newsletter',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
