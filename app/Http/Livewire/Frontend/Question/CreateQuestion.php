<?php

namespace App\Http\Livewire\Frontend\Question;

use App\Models\Question;
use Livewire\Component;

class CreateQuestion extends Component
{
    public $product,$question;
    public $is_answer=false;
    public $question_id;

    protected $listeners=[
        'addAnswerListener'
    ];

    public function addAnswerListener($question_id)
    {
        $this->question_id = $question_id;
        $this->is_answer=true;
    }

    public function addQuestion()
    {
        if(auth()->user()){
            Question::query()->create([
                'user_id'=>auth()->user()->id,
                'product_id'=>$this->product->id,
                'question'=>$this->question,
                'parent_id'=>null
            ]);
            session()->flash('message','سوال شما ثبت شد و پس از تایید به نمایش گذاشته می شود');
        }else{
            session()->flash('message','برای ثبت سوال حتما باید در سایت وارد شوید');
        }
    }

    public function addAnswer()
    {
        if(auth()->user()){
            Question::query()->create([
                'user_id'=>auth()->user()->id,
                'product_id'=>$this->product->id,
                'question'=>$this->question,
                'parent_id'=>$this->question_id
            ]);
            session()->flash('message','پاسخ شما ثبت شد و پس از تایید به نمایش گذاشته می شود');
        }else{
            session()->flash('message','برای ثبت پاسخ حتما باید در سایت وارد شوید');
        }
    }

    public function render()
    {
        return view('livewire.frontend.question.create-question');
    }
}
