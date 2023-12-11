<?php

namespace App\Http\Livewire\Frontend\Question;

use App\Enums\QuestionStatus;
use App\Models\Question;
use Livewire\Component;

class QuestionList extends Component
{
    public $product;

    public function addAnswer($question_id)
    {
        $this->emit('addAnswerListener', $question_id);
    }

    public function render()
    {
        $questions = Question::query()->where([
            'product_id'=>$this->product->id,
            'status'=>QuestionStatus::Approved->value,
            'parent_id'=>null
        ])->get();
        return view('livewire.frontend.question.question-list', compact('questions'));
    }
}
