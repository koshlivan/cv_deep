@extends('app')


@section('content')
    {{--    @if($message??null)--}}
    {{--        <div class="alert alert-info alert-dismissible fade show">--}}
    {{--            {{$message}}--}}
    {{--            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
    {{--        </div>--}}
    {{--    @endif--}}
    <div class="wraper">
        <div class="side-info">
            <img class="pr-photo" src="{{$user->photo??'Photo/profile.png'}}" alt="Profile">
            <h3 class="lblCont">Contact</h3>
            <p class="p-info">{{$user->phone??'555-55-55'}}<br>
                {{$user->email??'email@mail.com'}}<br>
                {{$user->address??'Country, City'}}<br>
                @php
                    $socials=explode(',', $user->linked);
                @endphp
                @foreach($socials as $social)
                    {{$social}}<br>
                @endforeach

            </p>

            <h3 class="lblCont">Education</h3>


            @php
                $deg=explode(',', $user->degree);
                $unv=explode(',', $user->university);
                $per=explode(',', $user->period);
            @endphp
            @for($i=0; $i<count($deg); $i++)
                <p class="p-info">
                    {{$deg[$i]??'Engineer'}}<br>
                    {{$unv[$i]??'Cambridge'}}<br>
                    {{$per[$i]??'2000-2001'}}<br>
                </p>
            @endfor


            <h3 class="lblCont">Skills</h3>
            <ul class="ul-info">
                @foreach(explode(',', $user->skill ?? '') as $skl)
                    <li>{{$skl??'all'}}</li>
                @endforeach
            </ul>
        </div>

        <div class="mmain-info">
            <div class="heading">
                <h1>{{$user->name??'My Name'}}</h1>
                <h2>Web Developer</h2>
            </div>
            <div class="remain-info">
                <h3>Profile</h3>
                <p>{{$user->profile??'Nothing to write'}}</p>
                <h3>Professional experience</h3>
                <p>{{$user->experience??'Not at all'}}</p>
            </div>
        </div>

    </div>
@endsection
