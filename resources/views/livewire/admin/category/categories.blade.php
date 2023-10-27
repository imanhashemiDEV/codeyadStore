<div class="table overflow-auto" tabindex="8">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
        <div class="col-sm-8">
            <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
        </div>
        <div class="col-sm-2">
            <a href="{{route('categories.trashed')}}"  class="btn btn-outline-warning">
                <i class="ti-trash"></i> دسته بندی های حذف شده
            </a>
        </div>
        <div class="mt-3 w-100">
            @if($searched_categories)
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center align-middle text-primary">عکس</th>
                        <th class="text-center align-middle text-primary">عنوان دسته بندی</th>
                        <th class="text-center align-middle text-primary">نام انگلیسی</th>
                        <th class="text-center align-middle text-primary">اسلاگ</th>
                        <th class="text-center align-middle text-primary">ویرایش</th>
                        <th class="text-center align-middle text-primary">حذف</th>
                        <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                    </tr>
                    </thead>
                    @foreach($searched_categories as $category)
                        <tr>
                            <td class="text-center align-middle">
                                <figure class="avatar avatar">
                                    <img src="{{$category->image ? url('images/categories/small/'.$category->image) : url('NoImage.png')}}" class="rounded-circle" alt="image">
                                </figure>
                            </td>
                            <td class="text-center align-middle">{{$category->title}}</td>

                            <td class="text-center align-middle">{{$category->etitle}}</td>
                            <td class="text-center align-middle">{{$category->slug}}</td>
                            <td class="text-center align-middle">
                                <a class="btn btn-outline-info" href="{{route('categories.edit', $category->id)}}">
                                    ویرایش
                                </a>
                            </td>
                            <td class="text-center align-middle">
                                <a class="btn btn-outline-danger" wire:click="deleteCategory({{$category->id}})">
                                    حذف
                                </a>
                            </td>
                            <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->format('%B %d، %Y')}}</td>
                        </tr>
                    @endforeach
                </table>


            @endif
        </div>
    </div>


    @foreach($categories as $category)
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <button class="btn btn-link primary-font" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        {{$category->parentCategory->title}}
                    </button>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th class="text-center align-middle text-primary">عکس</th>
                                <th class="text-center align-middle text-primary">عنوان دسته بندی</th>
                                <th class="text-center align-middle text-primary">نام انگلیسی</th>
                                <th class="text-center align-middle text-primary">اسلاگ</th>
                                <th class="text-center align-middle text-primary">ویرایش</th>
                                <th class="text-center align-middle text-primary">حذف</th>
                                <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td class="text-center align-middle">
                                    <figure class="avatar avatar">
                                        <img src="{{$category->image ? url('images/categories/small/'.$category->image) : url('NoImage.png')}}" class="rounded-circle" alt="image">
                                    </figure>
                                </td>
                                <td class="text-center align-middle">{{$category->title}}</td>

                                <td class="text-center align-middle">{{$category->etitle}}</td>
                                <td class="text-center align-middle">{{$category->slug}}</td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-outline-info" href="{{route('categories.edit', $category->id)}}">
                                        ویرایش
                                    </a>
                                </td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-outline-danger" wire:click="deleteCategory({{$category->id}})">
                                        حذف
                                    </a>
                                </td>
                                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->format('%B %d، %Y')}}</td>
                            </tr>

                        </table>
                        <div class="w-75">
                            @foreach($category->childCategory()->get() as $cat1)
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <button class="btn btn-link primary-font" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                {{$cat1->parentCategory->title}}
                                            </button>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-striped table-hover">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th class="text-center align-middle text-primary">عکس</th>
                                                        <th class="text-center align-middle text-primary">عنوان دسته بندی</th>
                                                        <th class="text-center align-middle text-primary">نام انگلیسی</th>
                                                        <th class="text-center align-middle text-primary">اسلاگ</th>
                                                        <th class="text-center align-middle text-primary">ویرایش</th>
                                                        <th class="text-center align-middle text-primary">حذف</th>
                                                        <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td class="text-center align-middle">
                                                            <figure class="avatar avatar">
                                                                <img src="{{$cat1->image ? url('images/categories/small/'.$cat1->image) : url('NoImage.png')}}" class="rounded-circle" alt="image">
                                                            </figure>
                                                        </td>
                                                        <td class="text-center align-middle">{{$cat1->title}}</td>
                                                        <td class="text-center align-middle">{{$cat1->etitle}}</td>
                                                        <td class="text-center align-middle">{{$cat1->slug}}</td>
                                                        <td class="text-center align-middle">
                                                            <a class="btn btn-outline-info" href="{{route('categories.edit', $cat1->id)}}">
                                                                ویرایش
                                                            </a>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <a class="btn btn-outline-danger" wire:click="deleteCategory({{$cat1->id}})">
                                                                حذف
                                                            </a>
                                                        </td>
                                                        <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($cat1->created_at)->format('%B %d، %Y')}}</td>
                                                    </tr>

                                                </table>
                                                <div class="w-75">
                                                    @foreach($cat1->childCategory()->get() as $cat2)
                                                        <div class="accordion" id="accordionExample">
                                                            <div class="card">
                                                                <div class="card-header" id="headingOne">
                                                                    <button class="btn btn-link primary-font" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                        {{$cat2->parentCategory->title}}
                                                                    </button>
                                                                </div>
                                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                    <div class="card-body">
                                                                        <table class="table table-striped table-hover">
                                                                            <thead class="thead-light">
                                                                            <tr>
                                                                                <th class="text-center align-middle text-primary">عکس</th>
                                                                                <th class="text-center align-middle text-primary">عنوان دسته بندی</th>
                                                                                <th class="text-center align-middle text-primary">نام انگلیسی</th>
                                                                                <th class="text-center align-middle text-primary">اسلاگ</th>
                                                                                <th class="text-center align-middle text-primary">ویرایش</th>
                                                                                <th class="text-center align-middle text-primary">حذف</th>
                                                                                <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                            <tr>
                                                                                <td class="text-center align-middle">
                                                                                    <figure class="avatar avatar">
                                                                                        <img src="{{$cat2->image ? url('images/categories/small/'.$cat2->image) : url('NoImage.png')}}" class="rounded-circle" alt="image">
                                                                                    </figure>
                                                                                </td>
                                                                                <td class="text-center align-middle">{{$cat2->title}}</td>
                                                                                <td class="text-center align-middle">{{$cat2->etitle}}</td>
                                                                                <td class="text-center align-middle">{{$cat2->slug}}</td>
                                                                                <td class="text-center align-middle">
                                                                                    <a class="btn btn-outline-info" href="{{route('categories.edit', $cat2->id)}}">
                                                                                        ویرایش
                                                                                    </a>
                                                                                </td>
                                                                                <td class="text-center align-middle">
                                                                                    <a class="btn btn-outline-danger" wire:click="deleteCategory({{$cat2->id}})">
                                                                                        حذف
                                                                                    </a>
                                                                                </td>
                                                                                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($cat2->created_at)->format('%B %d، %Y')}}</td>
                                                                            </tr>

                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
@section('scripts')

    <script>
        window.addEventListener('deleteCategory',event=>{
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
                    Livewire.emit('destroyCategory',event.detail.id)
                    Swal.fire(
                        'حذف با موفقیت انجام شد',
                    )
                }
            })
        })
    </script>
@endsection
