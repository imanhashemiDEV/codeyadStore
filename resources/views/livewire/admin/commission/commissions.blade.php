<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-10">
            <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">ردیف</th>
            <th class="text-center align-middle text-primary">دسته بندی</th>
            <th class="text-center align-middle text-primary">درصد کمیسیون</th>
            <th class="text-center align-middle text-primary">ویرایش</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($commissions as $index=> $commission)
            <tr>
                <td class="text-center align-middle">{{$commissions->firstItem()+$index}}</td>
                <td class="text-center align-middle">{{$commission->category->title}}</td>
                <td class="text-center align-middle">{{$commission->percentage}}</td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{route('commissions.edit', $commission->id)}}">
                        ویرایش
                    </a>
                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($commission->created_at)->format('%B %d، %Y')}}</td>
            </tr>
        @endforeach
    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{$commissions->appends(Request::except('page'))->links()}}
    </div>
</div>



