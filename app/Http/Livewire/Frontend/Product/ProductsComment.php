<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Enums\QuestionStatus;
use App\Models\Comment;
use App\Models\Order;
use App\Models\ProductScore;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProductsComment extends Component
{
    public $product,$title,$body,$suggestion,$advantage,$disadvantage;
    public $advantageList=[];
    public $disadvantageList=[];
    public $scoreList=[];

    protected $listeners = [
        'setScore',
    ];
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
        DB::beginTransaction();
        try{
            $comment = new Comment();
            $comment->user_id = auth()->user()->id;
            $comment->product_id = $this->product->id;
            $comment->title = $this->product->id;
            $comment->body = $this->body;
            $comment->advantage = implode('@',$this->advantageList);
            $comment->disadvantage = implode('@',$this->disadvantageList);
            $comment->is_buyer = Order::isBuyer($this->product->id,auth()->user()->id);
            $comment->suggestion = $this->suggestion;
            $comment->status = QuestionStatus::Draft->value;
            $this->product->comments()->save($comment);

            foreach ($this->scoreList as $key => $value){
                $score_item = ProductScore::query()
                    ->where('product_id', $this->product->id)
                    ->where('id', $key)->first();
                $score_item->increment('score', $value);
                $score_item->increment('count');
            }

            session()->flash('message','نظر شما ثبت شد و پس از تایید به نمایش گذاشته می شود');
            $this->reset('title','body','advantage','disadvantage','suggestion');
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();

        }

    }
    public function setScore($scoreList)
    {
        $this->scoreList=$scoreList;
    }
    public function render()
    {
        return view('livewire.frontend.product.products-comment');
    }
}
