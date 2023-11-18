@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.header')
    <main class="main-content dt-sl mb-3">
       <livewire:frontend.product.products-compare :product_id1="$product_id1" :product_id2="$product_id2"/>
    </main>
@endsection

