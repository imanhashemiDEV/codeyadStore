@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="card">
            <div class="card-body">
                <livewire:admin.category.livewire-category/>
            </div>
        </div>
    </main>
@endsection
