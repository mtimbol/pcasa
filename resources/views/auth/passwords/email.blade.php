@extends('layouts.app')
@section('bodyClass', 'h-screen')

@section('content')

<div class="flex items-center flex-col justify-center h-full">
    <h1 class="text-grey-darkest py-6">Pcasa</h1>
    <div class="w-1/2 bg-white shadow p-6">
        <form method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <div class="w-full mb-6">
                <label class="text-grey text-xs font-semibold uppercase tracking-wide block mb-2">Email</label>
                <input type="email" class="shadow border rounded w-full px-3 py-2" />
            </div> 
            <div class="w-full text-left">
                <button class="text-white bg-blue hover:bg-blue-dark rounded px-4 py-2">Send Password Reset Link</button>
                <a href="{{ route('login') }}" class="text-black px-4 py-2 no-underline">Cancel</button>
            </div> 
        </form>
    </div>
</div>

@endsection


<?php /*
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
*/ ?>