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
            <th class="text-center align-middle text-primary">عنوان انبار</th>
            <th class="text-center align-middle text-primary">لیست محصولات</th>
            <th class="text-center align-middle text-primary">وضعیت</th>
            <th class="text-center align-middle text-primary">ویرایش</th>
            <th class="text-center align-middle text-primary">حذف</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($vendors as $index=> $vendor)
            <tr>
                <td class="text-center align-middle">{{$vendors->firstItem()+$index}}</td>
                <td class="text-center align-middle">{{$vendor->title}}</td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-success" href="{{route('add.product.vendor', $vendor->id)}}">
                        لیست محصولات
                    </a>
                </td>
                <td class="text-center align-middle" wire:click="changeStatus({{$vendor->id}})">
                    @if($vendor->status==\App\Enums\VendorStatus::Active->value)
                        <span class="cursor-pointer badge badge-success">فعال</span>
                    @elseif($vendor->status==\App\Enums\VendorStatus::InActive->value)
                        <span class="cursor-pointer badge badge-danger">غیرفعال</span>
                    @endif

                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-info" href="{{route('vendors.edit', $vendor->id)}}">
                        ویرایش
                    </a>
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-danger" wire:click="deleteVendor({{$vendor->id}})">
                        حذف
                    </a>
                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($vendor->created_at)->format('%B %d، %Y')}}</td>
            </tr>
        @endforeach


    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{$vendors->appends(Request::except('page'))->links()}}
    </div>
</div>
@section('scripts')

    <script>
        window.addEventListener('deleteVendor',event=>{
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
                    Livewire.emit('destroyVendor',event.detail.id);
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection


