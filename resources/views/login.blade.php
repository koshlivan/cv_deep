@extends('app')

@section('content')
    <div class="wraper">
        <div class="reg-wind">


            <form id="log_form" action="{{ route('login') }}" method="post">
                @csrf
                <input type="hidden" name="frmLogin" >
                <div class="field-set">
                    <div class="row align-items-center field">
                        <label for="login" class="col-3">Login</label>
                        <input type="text" name="login" class="col-7" required>
                    </div>
                </div>
                <div class="row align-items-center field">
                    <label for="password" class="col-3">Pass</label>
                    <input type="password" name="password" class="col-7" required>
                </div>

{{--                <div>--}}
{{--                    <div class="row align-items-center field">--}}
{{--                        <label for="remember_me" class="p-info">--}}
{{--                            <input id="remember_me" type="checkbox" name="remember">--}}
{{--                            <span class="p-info">{{ __('Remember me') }}</span>--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div>
                    <div class="row align-items-center field">

                        <input type="submit" name="btnSubmit" id="btnSubm" value="Submit">
                    </div>
                </div>

{{--                <div class="flex items-center justify-end mt-4">--}}
{{--                    @if (Route::has('password.request'))--}}
{{--                        <a class="text-link" href="{{ route('password.request') }}">--}}
{{--                            {{ __('Forgot your password?') }}--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </div>--}}
            </form>
        </div>
        @if($errors->any())
            <div class="error">
                {{__('Login or password is incorrect')}}
            </div>
        @endif
        @if($mess_ok??null)
            <div class="message">
                {{$mess_ok??''}}
            </div>
        @endif
    </div>
@endsection
