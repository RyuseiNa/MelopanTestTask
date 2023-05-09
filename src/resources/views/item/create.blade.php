@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Item') }}</div>

                <div class="card-body">
                    <form action="/register/item" method="post"enctype="multipart/form-data">
                        @csrf
                        <h5>Item Name</h5>
                        <input name="name" type="text"><br>
                        <h5>SKU</h5>
                        <input name="SKU" type="text"><br>
                        <h5>Description</h5>
                        <textarea name="description" rows="10" cols="50"></textarea>
                        <h5>Item Image</h5>
                        <input name="file" type="file" accept="image/*"><br>
                        <p>　</p>
                        <input type="submit" value="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
