@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <livewire:admin.product.product-properties :product="$product"/>
            </div>
        </div>
    </main>
@endsection
