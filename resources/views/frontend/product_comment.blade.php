@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.header')
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <!-- Start Product -->
            <livewire:frontend.product.products-comment :product="$product"/>
            <!-- End Product -->
        </div>
    </main>
@endsection

