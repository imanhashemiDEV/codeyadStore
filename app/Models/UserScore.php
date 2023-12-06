<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserScore extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'comment_id',
        'type',
        'score_type'
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
