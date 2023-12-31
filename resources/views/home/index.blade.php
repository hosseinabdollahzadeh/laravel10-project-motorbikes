@extends('home.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <p>
                            click here for show motors list: <span style="color: red"><i>
                                <a class="navbar-brand" href="{{ route('home.motors') }}">Motors</a>
                            </i>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
