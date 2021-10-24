@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="cart">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($queues as $value)
                            <li class="list-group-item">{{ $value->number }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

    </div>

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
                    <h1>Your Number : {{ $queue->number  }}</h1>
                    <a href="{{ route('show.tickets') }}" class="btn btn-info w-50" style="color: #fff">Next</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
