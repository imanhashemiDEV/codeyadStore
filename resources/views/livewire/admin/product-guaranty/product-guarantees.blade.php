<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-8">
            <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
        </div>
    </div>
    <div class="row m-4">
        <a href="{{route('create.product.guarantees', $product_id)}}" class="btn btn-outline-info"> ایجاد تنوع قیمت </a>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">ردیف</th>
            @if(auth()->user()->is_admin)
            <th class="text-center align-middle text-primary">فروشنده</th>
            @endif
            <th class="text-center align-middle text-primary">قیمت اصلی</th>
            <th class="text-center align-middle text-primary">تخفیف</th>
            <th class="text-center align-middle text-primary">قیمت نمایش داده شده</th>
            <th class="text-center align-middle text-primary">گارانتی</th>
            <th class="text-center align-middle text-primary">تعداد</th>
            <th class="text-center align-middle text-primary">رنگ</th>
            <th class="text-center align-middle text-primary">فروش ویژه</th>
            <th class="text-center align-middle text-primary">ویرایش</th>
            <th class="text-center align-middle text-primary">حذف</th>
            <th class="text-center align-middle text-primary">وضعیت</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product_guarantees as $index=> $product_guaranty)
            <tr>
                <td class="text-center align-middle">{{$product_guarantees->firstItem()+$index}}</td>
                <td class="text-center align-middle">{{$product_guaranty->user->seller->company_name}}</td>
                <td class="text-center align-middle">{{$product_guaranty->main_price}}</td>
                <td class="text-center align-middle">{{$product_guaranty->discount}}</td>
                <td class="text-center align-middle">{{$product_guaranty->price}}</td>
                <td class="text-center align-middle">{{$product_guaranty->guaranty->title}}</td>
                <td class="text-center align-middle">{{$product_guaranty->count}}</td>
                <td class="text-center align-middle">{{$product_guaranty->color->title}}</td>
                <td class="text-center align-middle" >
                    @if($product_guaranty->special_strat == null && $product_guaranty->special_expiration == null)
                        <span class="cursor-pointer badge badge-light">فروش عادی</span>
                    @else
                        <span class="cursor-pointer badge badge-danger">فروش شگفت انگیز</span>

                    @endif

                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{route('edit.product.guarantees',[$product_guaranty->id,$product_id])}}">
                        ویرایش
                    </a>
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-danger" wire:click="deleteProductGuaranty({{$product_guaranty->id}})">
                        حذف
                    </a>
                </td>
                <td class="text-center align-middle" @if(auth()->user()->is_admin) wire:click="changeProductGuarantyStatus({{$product_guaranty->id}})" @endif>
                    @if($product_guaranty->status==\App\Enums\ProductStatus::Waiting->value)
                        <span class="cursor-pointer badge badge-info">در حال بررسی</span>
                    @elseif($product_guaranty->status==\App\Enums\ProductStatus::Verified->value)
                        <span class="cursor-pointer badge badge-success">تایید شده</span>
                    @elseif($product_guaranty->status==\App\Enums\ProductStatus::StopProduction->value)
                        <span class="cursor-pointer badge badge-danger">توقف تولید</span>
                    @elseif($product_guaranty->status==\App\Enums\ProductStatus::Rejected->value)
                        <span class="cursor-pointer badge badge-danger">رد شده</span>
                    @endif
                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($product_guaranty->created_at)->format('%B %d، %Y')}}</td>
            </tr>
        @endforeach


    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{$product_guarantees->appends(Request::except('page'))->links()}}
    </div>
</div>
@section('scripts')

    <script>
        window.addEventListener('deleteProductGuaranty',event=>{
            Swal.fire({
                title: 'آیا از حذف مطمئن هستید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله',
                cancelButtonText:'خیر'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('destroyProductGuaranty',event.detail.product_guaranty_id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection

