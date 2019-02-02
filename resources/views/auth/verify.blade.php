@extends('master')

@section('content')
<div class="container pt-5 pb-5">
    <div class="row justify-content-center pt-5 pb-5">
        <div class="col-md-8 pt-5 pb-5">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body pt-5 pb-5">
                    @if (session('resent'))
                        <div class="alert alert-success pt-5 pb-5" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
