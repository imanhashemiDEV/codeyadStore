<main class="main-content">
    <div class="row flex justify-content-center">
        <div class="col-10">
            <form wire:submit.prevent="submit">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control text-left" dir="rtl" wire:model.defer="search">
                    </div>
                    <div class="col-2">
                        <div class="form-group row">
                            <button type="submit" class="btn btn-success btn-uppercase">
                                <i class="ti-search m-r-5"></i> جستجو
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            @if(count($users) > 0 )
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center align-middle text-primary">عکس</th>
                        <th class="text-center align-middle text-primary">نام و نام خانوادگی</th>
                        <th class="text-center align-middle text-primary">ایمیل</th>
                        <th class="text-center align-middle text-primary">موبایل</th>
                        <th class="text-center align-middle text-primary">انتخاب</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td class="text-center align-middle">
                                <figure class="avatar avatar">
                                    <img src="{{url('images/users/small/'.$user->image)}}" class="rounded-circle" alt="image">
                                </figure>
                            </td>
                            <td class="text-center align-middle">{{$user->name}}</td>
                            <td class="text-center align-middle">{{$user->email}}</td>
                            <td class="text-center align-middle">{{$user->mobile}}</td>
                            <td class="text-center align-middle">
                                <a class="btn btn-outline-info" wire:click.prevent="selectUser({{$user}})">
                                    انتخاب
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h6 class="card-title"> ایجاد کارت هدیه</h6>
                <form wire:submit.prevent="addGiftCart">
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">نام و نام خانوادگی</label>
                        <div class="col-sm-10">
                            <label  class="col-sm-2 col-form-label">@if($selected_user) {{$selected_user['name']}} @endif</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">عنوان کارت هدیه</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" wire:model.defer="gift_title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">میزان تخفیف به تومان</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" wire:model.defer="gift_price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> تاریخ انقضای کد تخفیف </label>
                        <div class="col-sm-10">
                            <input type="text" id="expiration_date" class="text-left form-control" dir="rtl"
                                   wire:model.defer="expiration_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-success btn-uppercase">
                            <i class="ti-check-box m-r-5"></i> ذخیره
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
