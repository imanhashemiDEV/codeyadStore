<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">ثبت ورودی یا خروجی</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                    <i class="ti-close"></i>
                </button>
            </div>
            <div class="modal-body" wire:ignore.self>
                <h6 class="card-title">نام محصول :{{ $title }} </h6>
                <select class="form-control" wire:model="type">
                    <option value="{{\App\Enums\VendorEventType::Enter->value}}">ورود</option>
                    <option value="{{\App\Enums\VendorEventType::Exit->value}}">خروج</option>
                </select>
                <input type="text" class="form-control text-left mt-4"  dir="ltr" wire:model="count">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                <button type="button" class="btn btn-primary" wire:click="submitEnterOrExit">ثبت</button>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        window.addEventListener('closeModal',event=>{
            $("#ModalCenter").modal('toggle')
        })
    </script>
@endsection()
