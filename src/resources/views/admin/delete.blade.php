@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Delete') }}</div>

                <div class="card-body">
                    <h1>{{$admin->name}}</h1>
                    <h1>{{$admin->email}}</h1>
                    <form action="{{route("admin.delete",$admin->uuid)}}" method="post">
                        @csrf
                        <input name="uuid" type="hidden" value="{{$admin->uuid}}"><br>

                        <input type="submit" value="delete" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
