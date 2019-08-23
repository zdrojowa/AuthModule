@extends('AuthModule::layouts.Form')

@section('content')
    <form method="post" action="{{route('AuthModule::register.post')}}">
        @csrf
        <div class="form-header">
            <img src="/img/zdrojowa-invest-hotels.svg" alt="">
        </div>

        <div class="form-group">
            <label for="name">{{__('AuthModule::registerPage.full-name')}}</label>
            <input type="text" name="name" id="name" class="form-control @error('email') danger @enderror"  value="{{old('name')}}" placeholder="{{__('AuthModule::registerPage.full-name-placeholder')}}">

            @error('name')
                <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">{{__('AuthModule::registerPage.email')}}</label>
            <input type="text" name="email" id="email" class="form-control @error('email') danger @enderror"  value="{{old('email')}}" placeholder="{{__('AuthModule::registerPage.email-placeholder')}}">

            @error('email')
             <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{__('AuthModule::registerPage.password')}}</label>
            <input type="password" id="password" name="password" class="form-control @error('password') danger @enderror" placeholder="{{__('AuthModule::registerPage.password-placeholder')}}">

            @error('password')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">{{__('AuthModule::registerPage.password-confirmation')}}</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') danger @enderror" placeholder="{{__('AuthModule::registerPage.password-confirmation-placeholder')}}">

            @error('password_confirmation')
            <small class="error-text">{{ $message }}</small>
            @enderror
        </div>

        <button class="form-submit" type="submit">
            <span>{{__('AuthModule::registerPage.sign-up')}}</span>
        </button>
    </form>
@endsection
