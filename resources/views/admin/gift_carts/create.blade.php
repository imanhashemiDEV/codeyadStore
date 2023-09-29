@extends('admin.layouts.master')
@section('content')
    <livewire:admin.gift-cart.add-gift-cart/>
@endsection
@section('scripts')
    <script>
        var customOptions = {
            placeholder: "روز / ماه / سال"
            , twodigit: false
            , closeAfterSelect: true
            , nextButtonIcon: "fa fa-arrow-circle-right"
            , previousButtonIcon: "fa fa-arrow-circle-left"
            , buttonsColor: "#5867dd"
            , markToday: true
            , markHolidays: true
            , highlightSelectedDay: true
            , sync: true
            , gotoToday: true
        }
        kamaDatepicker('expiration_date', customOptions);
    </script>
@endsection
