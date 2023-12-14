<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-12">
            <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
        </div>
    </div>

    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">ردیف</th>
            <th class="text-center align-middle text-primary">نام محصول</th>
            <th class="text-center align-middle text-primary">رنگ</th>
            <th class="text-center align-middle text-primary">گارانتی</th>
            <th class="text-center align-middle text-primary">قیمت</th>
            <th class="text-center align-middle text-primary">تخفیف</th>
            <th class="text-center align-middle text-primary">تعداد</th>
            <th class="text-center align-middle text-primary">وضعیت</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $index=> $order)
            <tr>
                <td class="text-center align-middle">{{$orders->firstItem()+$index}}</td>
                <td class="text-center align-middle">{{$order->product->title}}</td>
                <td class="text-center align-middle">{{$order->color->title}}</td>
                <td class="text-center align-middle">{{$order->guaranty->title}}</td>
                <td class="text-center align-middle">{{$order->main_price}}</td>
                <td class="text-center align-middle">{{$order->discount}} %</td>
                <td class="text-center align-middle">{{$order->count}}</td>
                <td class="text-center align-middle" wire:click="chaneOrderDetailsStatus({{$order->id}})">
                    @if($order->status==\App\Enums\OrderDetailStatus::Waiting->value)
                        <span class="cursor-pointer badge badge-warning">در حال انتظار</span>
                    @elseif($order->status==\App\Enums\OrderDetailStatus::Received->value)
                        <span class="cursor-pointer badge badge-success">دریافت شده</span>
                    @elseif($order->status==\App\Enums\OrderDetailStatus::Rejected->value)
                        <span class="cursor-pointer badge badge-danger">پس داده شده</span>
                    @elseif($order->status==\App\Enums\OrderDetailStatus::Processing->value)
                        <span class="cursor-pointer badge badge-info">در حال پردازش</span>
                    @endif
                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($order->created_at)->format('%B %d، %Y')}}</td>
            </tr>
        @endforeach
    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{$orders->appends(Request::except('page'))->links()}}
    </div>
</div>
