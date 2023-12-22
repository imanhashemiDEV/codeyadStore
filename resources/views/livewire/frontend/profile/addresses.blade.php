<div class="dt-sl">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card-horizontal-address text-center px-4">
                <button class="checkout-address-location" data-toggle="modal"
                        data-target="#modal-location">
                    <strong>ایجاد آدرس جدید</strong>
                    <i class="mdi mdi-map-marker-plus"></i>
                </button>
            </div>
        </div>
        @foreach($addresses as $address)
            <div class="col-lg-6 col-md-12">
                <div class="card-horizontal-address">
                    <div class="card-horizontal-address-desc">
                        <h4 class="card-horizontal-address-full-name">{{$address->name}}</h4>
                        <p>
                            {{$address->address}}
                        </p>
                    </div>
                    <div class="card-horizontal-address-data">
                        <ul class="card-horizontal-address-methods float-right">
                            <li class="card-horizontal-address-method">
                                <i class="mdi mdi-email-outline"></i>
                                کدپستی : <span>{{$address->zip_code}}</span>
                            </li>
                            <li class="card-horizontal-address-method">
                                <i class="mdi mdi-cellphone-iphone"></i>
                                تلفن همراه : <span>{{$address->mobile}}</span>
                            </li>
                        </ul>
                        <div class="card-horizontal-address-actions">
                            <button class="btn-note" data-toggle="modal"
                                    wire:click="$emit('editAddress',{{$address->id}})"
                                    data-target="#modal-location-edit">ویرایش</button>
                            <button class="btn-note" data-toggle="modal"
                                    wire:click="$emit('showDeleteAddress',{{$address->id}})"
                                    data-target="#remove-location">حذف</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- End Content -->
    <!-- Start Modal location new -->
    <livewire:frontend.order.address-modal/>
    <!-- End Modal location new -->

    <!-- Start Modal location edit -->
    <livewire:frontend.order.edit-address-modal/>
    <!-- End Modal location edit -->

    <!-- Start Modal remove-location -->
    <livewire:frontend.order.delete-address-modal/>
    <!-- End Modal remove-location -->
</div>
