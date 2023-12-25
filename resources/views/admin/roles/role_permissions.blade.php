@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        @include('admin.layouts.errors')
        <div class="row">
            @if(\Illuminate\Support\Facades\Session::has('message'))
                <div class="alert alert-info">
                    <div>{{session('message')}}</div>
                </div>
            @endif
        </div>
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">اتصال نقش به مجوزها</h6>
                    <form method="POST" action="{{route('store.role.permissions', $role->id)}}" enctype="multipart/form-data">
                        @csrf
                       <div class="row">
                           <div class="col-6 offset-3">
                               <div class="list-group">
                                   <h1 class="list-group-item list-group-item-action"> مجوز های نقش {{ $role->name }}</h1>
                                   @foreach($permissions as $permission)
                                       <div class="form-check d-flex align-items-center">
                                           <input type="checkbox" @if($role->hasPermissionTo($permission->name)) checked @endif class="form-check-input" name="permissions[]" value="{{$permission->name}}">
                                           <label class="list-group-item list-group-item-action mt-2" for=""> {{$permission->name}} </label>
                                       </div>
                                   @endforeach
                               </div>
                           </div>
                       </div>
                        <div class="form-group row">
                            <button type="submit" class="btn btn-success btn-uppercase">
                                <i class="ti-check-box m-r-5"></i> ذخیره
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
