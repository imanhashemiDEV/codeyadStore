<?php

namespace App\Models;

use App\Enums\QuestionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'product_id',
        'question',
        'parent_id',
        'status'
    ];

    public function parentQuestion()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id')
            ->withDefault(['question'=>"سوال"]);
    }

    public function childQuestion()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')
            ->where('status',QuestionStatus::Approved->value);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
