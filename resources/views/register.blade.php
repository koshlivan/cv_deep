@extends('app')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            {{implode('', $errors->all(':message'))}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="wraper">

        <div class="reg-wind">
            <form id="reg_form" action="{{url('/register')}}" method="post">
                @csrf
                <div class="field-set">
                    <div class="row align-items-center field">
                        <label for="login" class="col-3">Login</label>
                        <input type="text" name="login" class="col-7 ml-2" required>
                    </div>
                    <div class="row align-items-center field">
                        <label for="email" class="col-3">Email</label>
                        <input type="email" name="email" class="col-7" required>
                    </div>
                    <div class="row align-items-center field">
                        <label for="password" class="col-3">Pass</label>
                        <input type="password" name="password" class="col-7" required>
                    </div>
                    <div class="row align-items-center field">
                        <label for="password_confirmation" class="col-3">Repeat pass</label>
                        <input type="password" name="password_confirmation" class="col-7" required>
                    </div>
                    <div class="row align-items-center field">
                        <label for="isAdmin" class="col-3">Admin permissions</label>
                        <input type="checkbox" name="isAdmin" class="col-7">
                    </div>
                </div>
                <div>
                    <div class="row align-items-center">
                        <a class="col-4 text-link" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                        <input type="submit" name="btnSubmit" id="btnSubm" value="Submit" class="col">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
