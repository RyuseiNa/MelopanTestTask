@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Item Delete') }}</div>

                <div class="card-body">

                    <h1>{{$item->name}}</h1>
                    {{-- {{dd($item)}} --}}
                    <img src="{{ asset("storage/item/".$item->imagepath) }}" alt={{$item->name}} width="400" height="300">
                    <p>SKU:{{$item->SKU}}　owner:{{$owner}}</p>
                    <div text-justify><p>{{$item->description}}</p></div>
                    @if(Auth::guard('admin')->user()->permissions->containsStrict('name','delete')&&$item->admin_id==Auth::guard('admin')->id())
                    <form action="{{route("item.delete",$UUID)}}" method="post">
                        @csrf
                        <input name="SKU" type="hidden" value="{{$item->SKU}}"><br>

                        <input type="submit" value="delete" class="btn btn-primary">
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
