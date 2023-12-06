<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'product_id',
        'title',
        'body',
        'advantage',
        'disadvantage',
        'is_buyer',
        'suggestion',
        'commentable_id',
        'commentable_type',
        'status',
        'liked',
        'disliked'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
     }

    public function product()
    {
        return $this->belongsTo(Product::class);
     }
}
