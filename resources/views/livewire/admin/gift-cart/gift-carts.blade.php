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
            <th class="text-center align-middle text-primary">کد کارت هدیه</th>
            <th class="text-center align-middle text-primary">عنوان کارت هدیه</th>
            <th class="text-center align-middle text-primary"> میزان کارت هدیه</th>
            <th class="text-center align-middle text-primary">نام کاربر</th>
            <th class="text-center align-middle text-primary">تاریخ انقضا</th>
            <th class="text-center align-middle text-primary">حذف</th>
            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gifts as $index=> $gift)
            <tr>
                <td class="text-center align-middle">{{$gifts->firstItem()+$index}}</td>
                <td class="text-center align-middle">{{$gift->code}}</td>
                <td class="text-center align-middle">{{$gift->gift_title}}</td>
                <td class="text-center align-middle">{{number_format($gift->gift_price)}} تومان</td>
                <td class="text-center align-middle">{{$gift->user->name}}</td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($gift->expiration_date)->format('%B %d، %Y')}}</td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-danger" wire:click="deleteGiftCart({{$gift->id}})">
                        حذف
                    </a>
                </td>
                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($gift->created_at)->format('%B %d، %Y')}}</td>
            </tr>
        @endforeach
    </table>
    <div style="margin: 40px !important;"
         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
        {{$gifts->appends(Request::except('page'))->links()}}
    </div>
</div>
@section('scripts')

    <script>
        window.addEventListener('deleteGiftCart',event=>{
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
                    Livewire.emit('destroyGiftCart',event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection



