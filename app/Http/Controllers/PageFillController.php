<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\School;
use App\Models\Social;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PageFillController extends Controller
{

    public function show(Request $request)
    {
        $info=$this->mainInfo();
        $skills=$this->Skills();
        $degries=$this->Degries();
        $universities=$this->University();
        $periods=$this->Periods();
        $socials=$this->Socials();

        //todo перенести в роутес
            return view('main')->with('info', $info)->
            with('skills', $skills)->
            with('degries', $degries)->
            with('socials', $socials)->
            with('periods', $periods)->
            with('universities', $universities);
    }

    public function keep(Request $request)
    {
        if(!Auth::user()){
            return redirect('/');
        }
        $info=$this->mainInfo();
        $skills=$this->Skills();
        $degries=$this->Degries();
        $universities=$this->University();
        $periods=$this->Periods();
        $socials=$this->Socials();

            return view('edit')->with('info', $info)->
            with('skills', $skills)->
            with('degries', $degries)->
            with('socials', $socials)->
            with('periods', $periods)->
            with('universities', $universities);
    }

    //вместо DB::table обращаться к модели
    private function mainInfo(){
        return Information::find(1);
    }
    private function Skills(){
        return Skill::query()->distinct()->pluck('skill');
        //return DB::table('skills')->distinct()->pluck('skill');
    }

    private function Degries(){
        return School::query()->distinct()->pluck('degree');
        //return DB::table('schools')->distinct()->pluck('degree');
    }

    private function University(){
        return School::query()->distinct()->pluck('university');
    }

    private function Periods(){
        return School::query()->distinct()->pluck('period');
    }

    private function Socials(){
        return Social::query()->distinct()->pluck('social');
    }
}
