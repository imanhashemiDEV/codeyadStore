<div class="modal fade" id="remove-location" tabindex="-1" role="dialog" wire:ignore.self
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mb-3" id="exampleModalLabel">آیا مطمئنید که
                    این آدرس حذف شود؟</h5>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="remodal-general-alert-button remodal-general-alert-button--cancel"
                        data-dismiss="modal">خیر</button>
                <button type="button" wire:click="deleteAddress({{$address_id}})"
                        class="remodal-general-alert-button remodal-general-alert-button--approve">بله</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('closeDeleteAddressModal',event=>{
            $("#remove-location").modal('toggle')
        })
    </script>
@endpush
