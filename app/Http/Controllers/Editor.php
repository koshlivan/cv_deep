<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class Editor extends Controller
{

    public function edition(Request $req){
        $usr=Auth::user();
        $login=$usr->login;

        $path = $this->photoPath($req);

        $user=User::where('login', 'ivan')->first();
        if($req['inpPhoto']!=''){
            $user->photo=$path;
        }
        else{
            $user->photo=$user->photo;
        }

        //only ivan can change data
        if($login=='ivan'){
            //get info from fields
            $user->phone=$req['inpPhone'];
            $user->email=$req['inpMail'];
            $user->address=$req['inpAddr'];
            $user->linked=$req['inpLd'];
            $user->degree=$req['inpDegree'];
            $user->university=$req['inpUniversity'];
            $user->period=$req['inpPeriod'];
            $user->skill=$req['inpSkill'];
            $user->name=$req['inpName'];
            $user->profile=$req['inpProfile'];
            $user->experience=$req['inpExper'];

            //save photo in directory
            if($req['inpPhoto']!='') {
                $file = $req->file('inpPhoto');
                $file->move('Photo/', 'avatar.png');
            }
            //save info
            $user->save();
        }

        return view('main', compact('user'));

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
