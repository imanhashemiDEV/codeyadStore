<div class="container">
    <h6 class="card-title">ایجاد ویژگی های محصول {{$product->title}}</h6>
    <form wire:submit.prevent="submit">
        <div class="form-group row">
            <select wire:model="property_group_id" class="col-sm-3">
                <option> انتخاب کنید </option>
                @foreach($property_groups as $property_group)
                    <option value="{{$property_group->id}}"> {{$property_group->title}} </option>
                @endforeach
            </select>

            <div class="col-sm-6">
                <input wire:model="title" type="text" class="form-control text-left" dir="rtl">
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-success btn-uppercase">
                    <i class="ti-check-box m-r-5"></i> ذخیره
                </button>
            </div>

        </div>
    </form>

    <table class="table table-striped table-hover">
        <thead class="thead-light">
        <tr>
            <th class="text-center align-middle text-primary">گروه ویژگی</th>
            <th class="text-center align-middle text-primary">ویژگی محصول</th>
            <th class="text-center align-middle text-primary">حذف</th>
        </tr>
        </thead>
        <tbody>
        @foreach($product_property_groups as $property_group)
            <tr>
                <td class="text-center align-middle">{{$property_group->title}}</td>
                <td class="text-center align-middle">
                    <ul class="list-group">
                        @foreach( $property_group->properties()->where( 'product_id', $product->id)->get() as $property  )
                           <div class="row flex justify-content-center align-items-center">
                               <li class="list-group-item col-9"> {{$property->title}}</li>
                                <i style="cursor: pointer;" wire:click="deleteProductProperty({{$property->id}} ,{{$property_group->id}} )" class="ti-trash m-r-5 col-2"></i>
                           </div>
                        @endforeach

                    </ul>
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-outline-danger" wire:click="deleteProductPropertyGroup({{$property_group->id}})">
                        حذف
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@section('scripts')

    <script>
        window.addEventListener('deleteProductPropertyGroup',event=>{
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
                    Livewire.emit('destroyProductPropertyGroup',event.detail.property_group_id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })


        window.addEventListener('deleteProductProperty',event=>{
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
                    Livewire.emit('destroyProductProperty',event.detail.property_id, event.detail.property_group_id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
