@extends('app')

@section('content')
    <div>
        <form class="wraper" action="/edit" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="side-info">
                <div class="for-photo">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <input type="file" id="ld_photo" placeholder="File input here" name="inpPhoto" >
                </div>
                <h3 class="lblCont">Contact</h3>
                <div class="contact">
                <input type="text" class="inp-edit" placeholder="Phone" name="inpPhone" value="{{$info->phone??''}}">
                <input type="email" class="inp-edit" placeholder="E-Mail" name="inpMail" value="{{$info->email??''}}">
                <input type="text" class="inp-edit" placeholder="Address" name="inpAddr" value="{{$info->address??''}}">

                    @foreach($socials as $social)
                <input id='linked' type="text" class="inp-edit" placeholder="LinkedIn" name="inpLd[]" value="{{$social??''}}">
                    @endforeach
                </div>
                <button id="addSoc" type="button">Add social network</button>
                <h3 class="lblCont">Education</h3>
                <div class="education">
                    @for($i=0; $i<count($degries); $i++)
                <input  class="inp-edit"
                        placeholder="Degree name"
                        name="inpDegree[]"
                        value="{{$degries[$i]}}"
                >
                <input  class="inp-edit"
                        placeholder="University name"
                        name="inpUniversity[]"
                        value="{{$universities[$i]}}"
                >
                <input  class="inp-edit"
                        placeholder="Period"
                        name="inpPeriod[]"
                        value="{{$periods[$i]}}"
                >
                    @endfor
                </div>
                <button id="addStudy" type="button">Add education</button>
                <h3 class="lblCont">Skills</h3>
                <div class="skills">
                    @foreach($skills as $skill)
                <input type="text"
                       id="skillInput"
                       class="inp-edit"
                       placeholder="php, html, css, javascript"
                       name="inpSkill[]"
                       value="{{$skill}}"
                >
                    @endforeach
                </div>
                <button id="addSkill" type="button">Add skill</button>
            </div>

            <div class="mmain-info">
                <div class="heading">
                    <input type="text"
                           class="inp-edit-name"
                           placeholder="Your name"
                           name="inpName"
                           value="{{$info->name??''}}"
                    >
                    <h2>web developer</h2>
                </div>
                <div class="remain-info">
                    <h3>Profile</h3>
                    <textarea  class="inp-edit-main"
                               placeholder="Personal information"
                               cols="20"
                               name="inpProfile"
                    >{{$info->profile??''}}</textarea>

                    <h3>Professional experiance</h3>
                    <textarea  class="inp-edit-main"
                               placeholder="Professional experience"
                               cols="20"
                               name="inpExper"
                    >{{$info->experience??''}}</textarea>
                    <input type="submit" value="Save">
                </div>
            </div>
        </form>
    </div>
@endsection
