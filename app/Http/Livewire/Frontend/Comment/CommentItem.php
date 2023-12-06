<?php

namespace App\Http\Livewire\Frontend\Comment;

use App\Models\Comment;
use App\Models\UserScore;
use Livewire\Component;

class CommentItem extends Component
{
    public $comment,$product;

    protected $listeners=[
        'refresh_comment'=>'$refresh'
    ];

    public function like($comment_id)
    {
      $user_id = auth()->user()->id;
        $user_score = UserScore::query()
            ->where('comment_id', $comment_id)
            ->where('user_id', $user_id)
            ->where('score_type', "comment")
            ->first();
        if($user_score){
            if($user_score->type=="dislike"){
                $user_score->update([
                    'type'=>'like'
                ]);
                $user_score->comment()->increment('liked');
                $user_score->comment()->decrement('disliked');
                $this->emit('refresh_comment');
            }
        }else{
            $new_user_score = UserScore::query()->create([
                'user_id'=>$user_id,
                'comment_id'=>$comment_id,
                'type'=>'like',
                'score_type'=>'comment'
            ]);
            $new_user_score->comment()->increment('liked');
            $this->emit('refresh_comment');
        }
    }

    public function dislike($comment_id)
    {
        $user_id = auth()->user()->id;
        $user_score = UserScore::query()
            ->where('comment_id', $comment_id)
            ->where('user_id', $user_id)
            ->where('score_type', "comment")
            ->first();
        if($user_score){
            if($user_score->type=="like"){
                $user_score->update([
                    'type'=>'dislike'
                ]);
                $user_score->comment()->decrement('liked');
                $user_score->comment()->increment('disliked');
                $this->emit('refresh_comment');
            }
        }else{
            $new_user_score = UserScore::query()->create([
                'user_id'=> $user_id,
                'comment_id'=>$comment_id,
                'type'=>'dislike',
                'score_type'=>'comment'
            ]);
            $new_user_score->comment()->increment('disliked');
            $this->emit('refresh_comment');
        }
    }

    public function render()
    {
        return view('livewire.frontend.comment.comment-item');
    }
}
