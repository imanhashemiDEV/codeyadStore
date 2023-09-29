@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        <div class="row">
            @if(\Illuminate\Support\Facades\Session::has('message'))
                <div class="alert alert-info">
                    <div>{{session('message')}}</div>
                </div>
            @endif
        </div>
        <div class="card">
            <div class="card-body">
               <livewire:admin.product-guaranty.product-guarantees :product_id="$product_id"/>
            </div>
        </div>
    </main>
@endsection
