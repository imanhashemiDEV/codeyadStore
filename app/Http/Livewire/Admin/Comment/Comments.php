<?php

namespace App\Http\Livewire\Admin\Comment;

use App\Enums\CommentStatus;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public function submitComment($comment_id)
    {
        $comment = Comment::query()->find($comment_id);
        if($comment->status == CommentStatus::Draft->value){
            $comment->update([
                'status'=> CommentStatus::Approved->value
            ]);
        }elseif($comment->status == CommentStatus::Approved->value){
            $comment->update([
                'status'=> CommentStatus::Rejected->value
            ]);
        }else{
            $comment->update([
                'status'=> CommentStatus::Approved->value
            ]);
        }
    }
    public function render()
    {
        $comments = Comment::query()->orderBy('created_at','DESC')->paginate(20);
        return view('livewire.admin.comment.comments', compact('comments'));
    }

}
