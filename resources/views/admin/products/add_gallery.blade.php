@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title"> ایجاد لیست تصاویر {{$product->title}}</h6>
                    <form class="dropzone border border-primary" method="POST" action="{{route('store.product.gallery', $product->id)}}">
                        @csrf
                        <div class="form-group row">
                             <div class="fallback">
                                 <input type="file" name="file" multiple>
                             </div>
                        </div>
                    </form>

                   {{--      List of product images              --}}
                    <livewire:admin.product.galleries :product="$product" />

                </div>
            </div>
        </div>
    </main>
@endsection

