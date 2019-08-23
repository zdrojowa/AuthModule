@extends('AuthModule::layouts.Form')

@section('content')
    <form method="post" action="{{route('AuthModule::login.post')}}">
        @csrf
        <div class="form-header">
            <img src="/img/zdrojowa-invest-hotels.svg" alt="">
        </div>




        @error('auth')
            <div class="alert danger">
                <div class="alert-icon">
                    <i class="mdi mdi-alert-circle"></i>
                </div>
                <div class="alert-content">
                    {{ $message }}
                </div>
            </div>
        @enderror

        <div class="form-group">
            <label for="email">{{__('AuthModule::loginPage.email')}}</label>
            <input type="text" name="email" id="email" class="form-control @error('email') danger @enderror"  value="{{old('email')}}" placeholder="{{__('AuthModule::loginPage.email-placeholder')}}">

            @error('email')
                <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{__('AuthModule::loginPage.password')}}</label>
            <input type="password" id="password" name="password" class="form-control @error('password') danger @enderror" placeholder="{{__('AuthModule::loginPage.password-placeholder')}}">

            @error('password')
                <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <input type="hidden" name="remember" id="remember">
            <div class="checkbox" data-checkbox-for="#remember">
                <div class="checkbox-holder">
                    <i class="mdi mdi-check"></i>
                </div>
                <div class="label">
                    {{__('AuthModule::loginPage.remember-me')}}
                </div>
            </div>
        </div>

        <button class="form-submit" type="submit">
            <span>{{__('AuthModule::loginPage.sign-in')}}</span>
        </button>
    </form>
@endsection
