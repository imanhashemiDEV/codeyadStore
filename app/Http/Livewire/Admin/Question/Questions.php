<?php

namespace App\Http\Livewire\Admin\Question;

use App\Enums\QuestionStatus;
use App\Models\Question;
use Livewire\Component;
use Livewire\WithPagination;

class Questions extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;

    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];

    public function submitQuestion($question_id)
    {
        $question = Question::query()->find($question_id);
        if($question->status == QuestionStatus::Draft->value){
            $question->update([
                'status'=> QuestionStatus::Approved->value
            ]);
        }elseif($question->status == QuestionStatus::Approved->value){
            $question->update([
                'status'=> QuestionStatus::Rejected->value
            ]);
        }else{
            $question->update([
                'status'=> QuestionStatus::Approved->value
            ]);
        }
    }

    public function render()
    {
        $questions = Question::query()->orderBy('created_at','DESC')->paginate(20);
        return view('livewire.admin.question.questions', compact('questions'));
    }

}
