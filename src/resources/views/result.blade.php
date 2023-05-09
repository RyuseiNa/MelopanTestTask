@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Result') }}</div>
                <div class="card-body">


                    {{ __($result) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
