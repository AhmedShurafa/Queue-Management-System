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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



            <div class="card text-center">

                <div class="card-header">Welcome</div>

                @if(session('number'))
                    <div class="card-body">
                        <p>Waiting...</p>
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Waiting...</span>
                          </div>
                        <h1>Your Number : {{ Session::get('number')  }}</h1>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('close') }}"
                            class="btn btn-danger">
                            <i class="fa fa-door-open"></i>
                                Exit
                        </a>
                    </div>
                    <div>
                        <a href="https://www.aljazeera.net/">الجزيرة</a> |
                        <a href="https://www.yallakora.com/">يلا كورة</a> |
                        <a href="https://ar-ar.facebook.com/login/device-based/regular/login/">Facebook</a>
                    </div>
                @else

                <div class="card-body">
                    Click the button to get Ticket
                </div>
                <div class="form-group">

                <form action="{{ route('add.ticket') }}" method="POST">
                    @csrf
                    <select name="service_id" required class="form-control w-50 m-auto">
                        <option value="0" selected disabled>choose Service</option>
                        @foreach ($servies as $servie)
                            <option value="{{ $servie->id }}">{{ $servie->name }}</option>
                        @endforeach
                    </select>
                    <div>
                        <button class="btn btn-success w-50 m-3">+Ticket</button>
                    </div>
                </form>

                @endif
            </div>
        </div>
    </div>
</div>
@endsection
