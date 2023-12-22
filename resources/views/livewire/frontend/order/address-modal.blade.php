<div class="modal fade" id="modal-location" role="dialog" wire:ignore.self
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg send-info modal-dialog-centered"
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    <i class="now-ui-icons location_pin"></i>
                    افزودن آدرس جدید
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-ui dt-sl">
                            <form class="form-account" style="max-width: 90% !important;" wire:submit.prevent="submit">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                نام و نام خانوادگی
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pr-2 text-right" wire:model.defer="name"
                                                   type="text"
                                                   placeholder="نام خود را وارد نمایید">
                                            @error('name')  <div class="alert alert-danger">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                شماره موبایل
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input wire:model="mobile"
                                                class="input-ui pl-2 dir-ltr text-left"
                                                type="text"
                                                placeholder="09xxxxxxxxx">
                                            @error('mobile')  <div class="alert alert-danger">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                استان
                                            </h4>
                                        </div>
                                        <div class="form-row" >
                                            <div class="form-group" style="width: 100% !important;">
                                                <select class="form-control" style="width: 100% !important;" id="province" wire:model.defer="province" wire:change="changeProvince($event.target.value)">
                                                    <option value="">
                                                        انتخاب استان
                                                    </option>
                                                    @foreach($provinces as $key => $value)
                                                        <option value="{{$key}}">
                                                            {{$value}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('province')  <div class="alert alert-danger">{{$message}}</div> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                شهر
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group" style="width: 100% !important;">
                                                <select class="form-control" style="width: 100% !important;" wire:model.defer="city">
                                                    <option value="">
                                                        انتخاب کنید
                                                    </option>
                                                    @foreach($cities as $key => $value)
                                                        <option value="{{$key}}">
                                                            {{$value}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('city')  <div class="alert alert-danger">{{$message}}</div> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                آدرس پستی
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                                    <textarea wire:model.defer="address"
                                                        class="input-ui pr-2 text-right"
                                                        placeholder=" آدرس تحویل گیرنده را وارد نمایید"></textarea>
                                            @error('address')  <div class="alert alert-danger">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                کد پستی
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input wire:model.defer="zip_code"
                                                class="input-ui pl-2 dir-ltr text-left placeholder-right"
                                                type="text"
                                                placeholder=" کد پستی را بدون خط تیره بنویسید">
                                            @error('zip_code')  <div class="alert alert-danger">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 pr-4 pl-4">
                                        <button type="submit"
                                                class="btn btn-sm btn-primary btn-submit-form">ثبت
                                            و
                                            ارسال به این آدرس</button>
                                        <button type="button"
                                                class="btn-link-border float-left mt-2">انصراف
                                            و بازگشت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('closeAddressModal',event=>{
              $("#modal-location").modal('toggle')
        })
    </script>
@endpush
