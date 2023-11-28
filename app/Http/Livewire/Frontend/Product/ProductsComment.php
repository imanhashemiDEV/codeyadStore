<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Enums\CommentStatus;
use App\Models\Comment;
use App\Models\Order;
use Livewire\Component;

class ProductsComment extends Component
{
    public $product,$title,$body,$suggestion,$advantage,$disadvantage;
    public $advantageList=[];
    public $disadvantageList=[];

    public function addAdvantage()
    {
        if($this->advantage){
            array_push($this->advantageList, $this->advantage);
            $this->reset('advantage');
        }
    }

    public function addDisAdvantage()
    {
        if($this->disadvantage){
            array_push($this->disadvantageList, $this->disadvantage);
            $this->reset('disadvantage');
        }
    }

    public function addComment()
    {
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->product_id = $this->product->id;
        $comment->title = $this->product->id;
        $comment->body = $this->body;
        $comment->advantage = implode('@',$this->advantageList);
        $comment->disadvantage = implode('@',$this->disadvantageList);
        $comment->is_buyer = Order::isBuyer($this->product->id,auth()->user()->id);
        $comment->suggestion = $this->suggestion;
        $comment->status = CommentStatus::Draft->value;
        $this->product->comments()->save($comment);

        session()->flash('message','نظر شما ثبت شد و پس از تایید به نمایش گذاشته می شود');
        $this->reset('title','body','advantage','disadvantage','suggestion');
    }

    public function render()
    {
        return view('livewire.frontend.product.products-comment');
    }
}
