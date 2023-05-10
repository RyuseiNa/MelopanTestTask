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
                            <th>mail</th>
                            <th>crud</th>
                            <th colspan="2">action</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($admins as $admin)
                          <tr>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            @php
                            $permissions = $admin->permissions;
                            $crud ="";
                            foreach ($permissions as $permission) {
                                $crud = $crud.substr($permission->name, 0, 1);
                            }
                            @endphp
                            <td>{{$crud}}</td>
                            <td>
                                <a href="{{route('admin.update', $admin->uuid)}}">
                                    <button class="btn btn-sm btn-info">Edit</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('admin.delete', $admin->uuid)}}">
                                    <button class="btn btn-sm btn-info">Delete</button>
                                </a>
                            </td>
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
