<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-6">
            <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
        </div>
        @if(auth()->user()->is_admin)
        <div class="col-sm-2">
            <a href="{{route('products.trashed')}}"  class="btn btn-outline-warning">
                <i class="ti-trash"></i> محصولات حذف شده
            </a>
        </div>
        @endif
            <div class="col-sm-2">
                <a href="{{route('products.create')}}"  class="btn btn-outline-info">
                    <i class="ti-plus"></i> اضافه کردن محصول
                </a>
            </div>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">ردیف</th>
            <th class="text-center align-middle text-primary">عکس</th>
            <th class="text-center align-middle text-primary">نام محصول</th>
            <th class="text-center align-middle text-primary"> فروشنده</th>
            <th class="text-center align-middle text-primary">دسته بندی</th>
            <th class="text-center align-middle text-primary">برند</th>
            <th class="text-center align-middle text-primary">تنوع قیمت</th>
            <th class="text-center align-middle text-primary">ویژگی محصول</th>
            @if(auth()->user()->is_admin)
            <th class="text-center align-middle text-primary">نقد و بررسی</th>
            <th class="text-center align-middle text-primary">وضعیت</th>
            @endif
            <th class="text-center align-middle text-primary">گالری</th>
            <th class="text-center align-middle text-primary">ویرایش</th>
            <th class="text-center align-middle text-primary">حذف</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $index=> $product)
            <tr>
                <td class="text-center align-middle">{{$products->firstItem()+$index}}</td>
                <td class="text-center align-middle">
                    <figure class="avatar avatar">
                        <img src="{{url('images/products/small/'.$product->image)}}"  alt="image">
                    </figure>
                </td>
                <td class="text-center align-middle">{{$product->title}}</td>
                <td class="text-center align-middle">{{$product->user->seller->company_name}}</td>
                <td class="text-center align-middle">{{$product->category->title}}</td>
                <td class="text-center align-middle">{{$product->brand->title}}</td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{route('product.guarantees',$product->id)}}">
                        تنوع قیمت
                    </a>
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-warning" href="{{route('create.product.properties',$product)}}">
                        ویژگی محصول
                    </a>
                </td>
                @if(auth()->user()->is_admin)
                <td class="text-center align-middle">
                    <a class="btn btn-outline-warning" href="{{route('product.discussions',$product->id)}}">
                        نقد و بررسی
                    </a>
                </td>
                <td class="text-center align-middle" wire:click="chaneProductStatus({{$product->id}})">
                    @if($product->status==\App\Enums\ProductStatus::Waiting->value)
                        <span class="cursor-pointer badge badge-info">در حال بررسی</span>
                    @elseif($product->status==\App\Enums\ProductStatus::Verified->value)
                        <span class="cursor-pointer badge badge-success">تایید شده</span>
                    @elseif($product->status==\App\Enums\ProductStatus::StopProduction->value)
                        <span class="cursor-pointer badge badge-warning">توقف تولید</span>
                    @elseif($product->status==\App\Enums\ProductStatus::Rejected->value)
                        <span class="cursor-pointer badge badge-danger">رد شده</span>
                    @endif

                </td>
                @endif
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{route('add.product.gallery',$product->id)}}">
                        گالری
                    </a>
                </td>
                <td class="text-center align-middle">
                    @if(auth()->user()->id == $product->user->id)
                    <a class="btn btn-outline-info" href="{{route('products.edit', $product->id)}}">
                        ویرایش
                    </a>
                    @endif
                </td>
                <td class="text-center align-middle">
                    @if(auth()->user()->id == $product->user->id)
                    <a class="btn btn-outline-danger" wire:click="deleteProduct({{$product->id}})">
                        حذف
                    </a>
                    @endif
                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($product->created_at)->format('%B %d، %Y')}}</td>
            </tr>
        @endforeach


    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{$products->appends(Request::except('page'))->links()}}
    </div>
</div>
@section('scripts')

    <script>
        window.addEventListener('deleteProduct',event=>{
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
                    Livewire.emit('destroyProduct',event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection

