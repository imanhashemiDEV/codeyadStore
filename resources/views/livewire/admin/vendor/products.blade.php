<div>
    <div class="table overflow-auto" tabindex="8">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">عنوان جستجو در انبار</label>
            <div class="col-sm-10">
                <input type="text" class="form-control text-left" dir="rtl" wire:model="search_vendor">
            </div>
        </div>
        <div class="row">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
        </div>
        <table class="table table-striped table-hover">
            <thead class="thead-light">
            <tr>
                <th class="text-center align-middle text-primary">ردیف</th>
                <th class="text-center align-middle text-primary">نام محصول</th>
                <th class="text-center align-middle text-primary">گارانتی</th>
                <th class="text-center align-middle text-primary">تعداد</th>
                <th class="text-center align-middle text-primary">رنگ</th>
                <th class="text-center align-middle text-primary">حذف از انبار</th>
                <th class="text-center align-middle text-primary">ورودی یا خروجی</th>
                <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vendor_products as $index=> $vendor_product)
                <tr>
                    <td class="text-center align-middle">{{$vendor_products->firstItem()+$index}}</td>
                    <td class="text-center align-middle">{{$vendor_product->productGuaranty->product->title}}</td>
                    <td class="text-center align-middle">{{$vendor_product->productGuaranty->guaranty->title}}</td>
                    <td class="text-center align-middle">{{$vendor_product->count}}</td>
                    <td class="text-center align-middle">{{$vendor_product->productGuaranty->color->title}}</td>
                    <td class="text-center align-middle" wire:click="deleteFromVendor({{$vendor_product->id}})">
                        <a class="btn btn-outline-info">
                            حذف از انبار
                        </a>
                    </td>
                    <td class="text-center align-middle" wire:click="$emit('enterOrExitInVendor',{{$vendor_product->productGuaranty->id}},{{$vendor_id}})" >
                        <a class="btn btn-outline-info" data-toggle="modal" data-target="#ModalCenter">
                            ورودی | خروجی
                        </a>
                    </td>
                    <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($vendor_product->created_at)->format('%B %d، %Y')}}</td>
                </tr>
            @endforeach
        </table>
        <div style="margin: 40px !important;"
             class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
            {{$vendor_products->appends(Request::except('page'))->links()}}
        </div>
    </div>
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
                <th class="text-center align-middle text-primary">نام محصول</th>
                <th class="text-center align-middle text-primary">گارانتی</th>
                <th class="text-center align-middle text-primary">تعداد</th>
                <th class="text-center align-middle text-primary">رنگ</th>
                <th class="text-center align-middle text-primary">اضافه به انبار</th>
                <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product_guarantees as $index=> $product_guaranty)
                <tr>
                    <td class="text-center align-middle">{{$product_guarantees->firstItem()+$index}}</td>
                    <td class="text-center align-middle">{{$product_guaranty->product->title}}</td>
                    <td class="text-center align-middle">{{$product_guaranty->guaranty->title}}</td>
                    <td class="text-center align-middle">{{$product_guaranty->count}}</td>
                    <td class="text-center align-middle">{{$product_guaranty->color->title}}</td>
                    <td class="text-center align-middle" wire:click="addToVendor({{$product_guaranty->id}},{{$product_guaranty->count}},{{$vendor_id}})">
                        <a class="btn btn-outline-info">
                            اضافه به انبار
                        </a>
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
</div>

<livewire:admin.vendor.enter-or-exit-in-vendor-modal/>


