@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('success'))

                    <div class="col-sm-12">
                        <div class="alert alert-success text-center" role="alert">
                            <h4>{{ session('success') }}</h4>
                        </div>
                    </div>

            @endif

            <div class="card text-center">

                <div class="card-header">Admin</div>
                <div class="card-body">
                    <h3>{{ $msg }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
