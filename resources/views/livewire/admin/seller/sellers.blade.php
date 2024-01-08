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
            <th class="text-center align-middle text-primary">نام شرکت</th>
            <th class="text-center align-middle text-primary">شماره اقتصادی شرکت</th>
            <th class="text-center align-middle text-primary">قرارداد</th>
            <th class="text-center align-middle text-primary"> وضعیت</th>
            <th class="text-center align-middle text-primary">نقش فروشنده</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sellers as $index=> $seller)
            <tr>
                <td class="text-center align-middle">{{$sellers->firstItem()+$index}}</td>
                <td class="text-center align-middle">{{$seller->company_name}}</td>
                <td class="text-center align-middle">{{$seller->company_economy_number}}</td>
                <td class="text-center align-middle" wire:click="chaneSellerStatus({{$seller->id}})">
                    @if($seller->status==\App\Enums\CompanyStatus::Active->value)
                        <span class="cursor-pointer badge badge-success">پذیرفته شده</span>
                    @elseif($seller->status==\App\Enums\CompanyStatus::Request->value)
                        <span class="cursor-pointer badge badge-danger">درخواست اولیه</span>
                    @elseif($seller->status==\App\Enums\CompanyStatus::Banned->value)
                        <span class="cursor-pointer badge badge-danger">رد شده</span>
                    @endif
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{route('create.user.role', $seller->user->id)}}">
                        نقش های کاربر
                    </a>
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{url('files/contracts/'.$seller->company_name.'/'.$seller->contract)}}">
                        دانلود قرارداد
                    </a>
                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($seller->created_at)->format('%B %d، %Y')}}</td>
            </tr>
        @endforeach


    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{$sellers->appends(Request::except('page'))->links()}}
    </div>
</div>

