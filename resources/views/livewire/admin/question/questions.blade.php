<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-10">
            <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
        </div>
    </div>
    <table class="table table-bordered table-hover ">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">ردیف</th>
            <th class="text-center align-middle text-primary">نام کاربر</th>
            <th class="text-center align-middle text-primary">نام محصول</th>
            <th class="text-center align-middle text-primary">متن سوال یا پاسخ</th>
            <th class="text-center align-middle text-primary">تایید یا عدم تایید</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $index=> $question)
            <tr>
                <td class="text-center align-middle">{{$questions->firstItem()+$index}}</td>
                <td class="text-center align-middle">{{$question->user->name}}</td>
                <td class="text-center align-middle">{{$question->product->title}}</td>
                <td class="text-center align-middle">{{$question->question}}</td>
                <td class="text-center align-middle">
                    @if($question->status == \App\Enums\QuestionStatus::Draft->value || $question->status == \App\Enums\QuestionStatus::Rejected->value)
                        <a class="btn btn-outline-success" wire:click="submitQuestion({{$question->id}})">
                            تایید
                        </a>
                    @else
                        <a class="btn btn-outline-danger" wire:click="submitQuestion({{$question->id}})">
                            عدم تایید
                        </a>
                    @endif

                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($question->created_at)->format('%B %d، %Y')}}</td>
            </tr>
        @endforeach


    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{$questions->appends(Request::except('page'))->links()}}
    </div>
</div>



