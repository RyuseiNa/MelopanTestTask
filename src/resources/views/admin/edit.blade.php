@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Admin') }}</div>

                <div class="card-body">
                    <form action="{{route("admin.update",$admin->uuid)}}" method="post"enctype="multipart/form-data">
                        @csrf
                        <h5>Admin Name</h5>
                        <input name="name" type="text" value="{{$admin->name}}"><br>
                        <h5>email</h5>
                        <input name="email" type="email" value="{{$admin->email}}"><br>
                        <h5>UUID</h5>
                        <input name="uuid" type="text" value="{{$admin->uuid}}"><br>
                        <input type="checkbox" id="create" name="create" {{ in_array("1",$crud) ? 'checked' : '' }}>
                        <label for="create">Create</label>
                        <input type="checkbox" id="read" name="read" {{ in_array("2",$crud) ? 'checked' : '' }}>
                        <label for="read">Read</label>
                        <input type="checkbox" id="update" name="update" {{ in_array("3",$crud) ? 'checked' : '' }}>
                        <label for="update">Update</label>
                        <input type="checkbox" id="delete" name="delete" {{ in_array("4",$crud) ? 'checked' : '' }}>
                        <label for="delete">Delete</label>
                        <br>
                        <input type="submit" value="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
