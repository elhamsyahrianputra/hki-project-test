@extends('layouts.auth')

@section('style')
    <style>
        .authentication-wrapper.authentication-basic .authentication-inner {
            max-width: 700px;
            position: relative;
        }
    </style>
@endsection

@section('content')
    <div class="text-center my-4">
        <span class="bx bx-envelope bg-primary text-white inline-block rounded-circle p-2" style="font-size: 72px"></span>
    </div>
    <div class="text-center">
        <h2>Please verify your email address</h2>
    </div>
    <div class="text-center my-3">
        <span>We have sent a verification link to <b>{{ auth()->user()->email }}</b>.</span>
    </div>
    <div class="text-center my-3">
        <span class="d-block">Click on the link to complete the verification process.</span>
        <span class="d-block">You Might need to <b>check to your spam folder</b></span>
    </div>
    <div class="d-flex justify-content-center gap-3 my-3">
        <form action="/email/verification-notification" method="POST">
        @csrf
            <button type="submit" class="btn btn-primary">
                Resend Verification Email
            </button>
        </form>
        <form action="/logout" method="post">
            @csrf
            <button class="btn btn-outline-primary" type="submit" class="">Log Out <span class="d-inline-block h bx bx-chevron-right"></span></button>
        </form>
    </div>
@endsection