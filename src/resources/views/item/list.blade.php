@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Item List') }}</div>

                <div class="card-body center-block">
                    <table class="table table-striped justify-content-center text-center">
                        <thead>
                          <tr>
                            <th>name</th>
                            <th>SKU</th>
                            <th>image</th>
                            @if(Auth::guard("admin")->check())
                            <th colspan="3">action</th>
                            @else
                            <th></th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($items as $item)
                          <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->SKU }}</td>
                            <td><img src="{{ asset("storage/item/".$item->imagepath) }}" alt={{$item->name}}width="250" height="150"></td>
                            <td>
                                <a href="{{route('item.detail', $item->uuid)}}">
                                    <button class="btn btn-sm btn-info">Detail</button>
                                </a>
                            </td>
                            @if(Auth::guard('admin')->check())
                            @if(Auth::guard('admin')->user()->permissions->containsStrict('name','update')&&$item->admin_id==Auth::guard('admin')->id())
                            <td>
                                <a href="{{route('item.update', $item->uuid)}}">
                                    <button class="btn btn-sm btn-info">Edit</button>
                                </a>
                            </td>
                            @endif
                            @if(Auth::guard('admin')->user()->permissions->containsStrict('name','delete')&&$item->admin_id==Auth::guard('admin')->id())
                            <td>
                                <a href="{{route('item.delete', $item->uuid)}}">
                                    <button class="btn btn-sm btn-info">Delete</button>
                                </a>
                            </td>
                            @endif
                            @endif
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
