<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Social;
use App\Models\Skill;
use App\Models\School;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\List_;


class EditController extends Controller
{

    public function update(Request $req){
        $usr=Auth::user();
        if($usr){
        $isAdmin=$usr->is_admin;
        $recId=1;

        $path = $this->photoPath($req);

        $info=Information::find(1);
        $socials=$req['inpLd'];
        $degries=$req['inpDegree'];
        $universities=$req['inpUniversity'];
        $periods=$req['inpPeriod'];
        $skills=$req['inpSkill'];

        if(is_null($info)){
            $info=new Information;
            $info->id=$recId;
            $info->save();
        }
        if($req['inpPhoto']!=''){
            $info->photo=$path;
        }
        else{
            $info->photo=$info->photo;
        }
        //todo права администратора



        //only admins can change data
        if($isAdmin){
            //get info from fields
            $info->phone=$req['inpPhone'];
            $info->email=$req['inpMail'];
            $info->address=$req['inpAddr'];


            foreach ($socials as $social){
                $soc=new Social;
                $soc->social=$social;
                $soc->information_id=$recId;
                $soc->save();
               //DB::table('socials')->insertOrIgnore(['social'=>$social, 'user_id'=>$recId]);
            }



            for($i=0; $i<count($degries); $i++){
                $school=new School;
                $school->degree=$degries[$i];
                $school->university=$universities[$i];
                $school->period=$periods[$i];
                $school->information_id=$recId;
                $school->save();

//                DB::table('schools')->insertOrIgnore([
//                    'university'=>$universities[$i],
//                    'degree'=>$degries[$i],
//                    'period'=>$periods[$i],
//                    'user_id'=>$recId
//                    ]);
            }


            foreach ($skills as $skill){
                $skl=new Skill;
                $skl->skill=$skill;
                $skl->information_id=$recId;
                $skl->save();
                //DB::table('skills')->insertOrIgnore(['skill'=>$skill, 'user_id'=>$recId]);
            }

            $info->name=$req['inpName'];
            $info->profile=$req['inpProfile'];
            $info->experience=$req['inpExper'];

            //save photo in directory
            if($req['inpPhoto']!='') {
                $file = $req->file('inpPhoto');
                $file->move('Photo/', 'avatar.png');
            }
            //save info
            $info->save();
        }
        }

        return view('main', compact('info', 'skills', 'degries', 'universities', 'periods' ,'socials'));
    }

    //can return photo path if it would be dynamic
    public function photoPath(Request $request)
    {
        if($request['inpPhoto']!='') {
            //return $request->file('inpPhoto')->store('photo');
            return 'Photo/avatar.png';
        }
        else{
            return '';
        }
    }
}
