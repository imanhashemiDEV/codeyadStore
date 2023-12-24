<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'company_name',
        'company_economy_number',
        'contract',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
