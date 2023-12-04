@push('styles')
    <link rel="stylesheet" href="{{url('frontend/plugins/star_rating/star-rating.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/plugins/star_rating/theme.css')}}">
@endpush
<div class="comments-product-attributes px-3 dt-sl">
    <div class="row">
        @foreach($scores as $score)
            <div class="col-sm-6 col-12 mb-3" wire:ignore >
                <div class="comments-product-attributes-title">{{$score->title}}</div>
                <input id="input-{{$score->id}}" onchange="getRate({{$score->id}})" type="number" class="rating"  data-rtl="true">
            </div>
        @endforeach
    </div>
</div>
@push('scripts')
    <script src="{{url('frontend/plugins/star_rating/star-rating.min.js')}}"></script>
    <script src="{{url('frontend/plugins/star_rating/theme.js')}}"></script>
    <script src="{{url('frontend/plugins/star_rating/lang.js')}}"></script>
    <script>
        $(".rating").rating(
            {
                min:0,
                max:5,
                step:1,
                size:'md',
                starCaptions:{
                    1: 'بد',
                    2: 'ضعیف',
                    3: 'متوسط',
                    4: 'خوب',
                    5: 'عالی'
                },
                showCaption:false,
                showClear:false,
            }
        );

        function getRate(id){
             let rateValue = $(`#input-${id}`).rating().val();
            // console.log(rateValue)
            Livewire.emit('getScore',rateValue,id)
        }
    </script>
@endpush
