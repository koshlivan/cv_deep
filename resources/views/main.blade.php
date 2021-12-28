@extends('app')


@section('content')
    <div class="wraper">
        <div class="side-info">
            <img class="pr-photo" src="{{$info->photo??'Photo/profile.png'}}" alt="Profile">
            <h3 class="lblCont">Contact</h3>
            <p class="p-info">{{$info->phone??'555-55-55'}}<br>
                {{$info->email??'email@mail.com'}}<br>
                {{$info->address??'Country, City'}}<br>
            </p>
            @foreach($socials as $social)
                <a class="soc" href="{{'http://'.$social}}">{{$social}}</a>
            @endforeach

            <h3 class="lblCont">Education</h3>
            @for($i=0; $i<count($degries); $i++)
                <p class="p-info">{{$degries[$i]??'worker'}}<br>
                    {{$universities[$i]??'academy'}}<br>
                    {{$periods[$i]??'1900'}}<br>
                </p>
            @endfor

            <h3 class="lblCont">Skills</h3>
            <ul class="ul-info">
                @foreach($skills as $skill)
                    <li>{{$skill}}</li>
                @endforeach
            </ul>
        </div>

        <div class="mmain-info">
            <div class="heading">
                <h1>{{$info->name??'My Name'}}</h1>
                <h2>Web Developer</h2>
            </div>
            <div class="remain-info">
                <h3>Profile</h3>
                <p>{{$info->profile??'Nothing to write'}}</p>
                <h3>Professional experience</h3>
                <p>{{$info->experience??'Not at all'}}</p>
            </div>
        </div>

    </div>
@endsection
