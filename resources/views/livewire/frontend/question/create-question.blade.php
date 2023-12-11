<div class="form-question-answer dt-sl mb-3">
    <form >
        <textarea class="form-control mb-3" rows="5" wire:model.defer="question"></textarea>
        @if($is_answer===true)
        <button wire:click.prevent="addAnswer" type="submit" class="btn btn-dark float-right ml-3">ثبت پاسخ</button>
        @else
        <button wire:click.prevent="addQuestion" type="submit" class="btn btn-dark float-right ml-3">ثبت پرسش</button>
        @endif
    </form>
    <div class="row">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
    </div>
</div>
