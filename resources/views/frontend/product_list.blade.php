@extends('frontend.layouts.master')
@section('content')
    @include('frontend.layouts.header')
    <main class="main-content dt-sl mb-3">
        <div class="container main-container">
            <div class="row">
                <!-- Start Sidebar -->
              <livewire:frontend.product.product-filters :main_slug="$main_category_slug" :sub_slug="$sub_category_slug" :child_slug="$child_category_slug"/>
                <!-- End Sidebar -->
                <!-- Start Content -->
                <livewire:frontend.product.products :main_slug="$main_category_slug" :sub_slug="$sub_category_slug" :child_slug="$child_category_slug"/>
                <!-- End Content -->
            </div>
        </div>
    </main>
    <!-- End main-content -->
@endsection

