@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Item Detail') }}</div>

                <div class="card-body">

                    <h1>{{$item->name}}</h1>
                    {{-- {{dd($item)}} --}}
                    <img src="{{ asset("storage/item/".$item->imagepath) }}" alt={{$item->name}}width="400" height="300">
                    <p>SKU:{{$item->SKU}}　owner:{{$owner}}</p>
                    <div text-justify><p>{{$item->description}}</p></div>
                    @if(Auth::guard('admin')->check())
                    @if(Auth::guard('admin')->user()->permissions->containsStrict('name','update')&&$item->admin_id==Auth::guard('admin')->id())

                                <a href="{{route('item.update', $item->uuid)}}">
                                    <button class="btn btn-sm btn-info ">Edit</button>

                                </a>
                                <a>　</a>

                    @endif
                    @if(Auth::guard('admin')->user()->permissions->containsStrict('name','delete')&&$item->admin_id==Auth::guard('admin')->id())

                                <a href="{{route('item.delete', $item->uuid)}}">
                                    <button class="btn btn-sm btn-info">Delete</button>
                                </a>

                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
