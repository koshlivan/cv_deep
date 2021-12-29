<?php

namespace App\Services;

use App\Models\Information;
use App\Models\School;
use App\Models\Skill;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\Array_;

class ResumeService
{

    public static function mainInfo()
    {
        return Information::find(1);
    }

    public static function skills()
    {
        return Skill::query()->distinct()->pluck('skill');
    }

    public static function degries()
    {
        return School::query()->distinct()->pluck('degree');
    }

    public static function university()
    {
        return School::query()->distinct()->pluck('university');
    }

    public static function periods()
    {
        return School::query()->distinct()->pluck('period');
    }

    public static function socials()
    {
        return Social::query()->distinct()->pluck('social');
    }

    /**
     * @param array $socialsArray
     * @return void
     *
     */
    public static function saveSocial($socialsArray)
    {
        foreach ($socialsArray as $social) {
            $soc = new Social;
            $soc->social = $social;
            $soc->save();
        }
    }

    /**
     * @param array $degrees
     * @param array $universities
     * @param array $periods
     * @return void
     *
     */
    public static function saveSchool(array $degrees, array $universities, array $periods)
    {
        for ($i = 0; $i < count($degrees); $i++) {
            $school = new School;
            $school->degree = $degrees[$i];
            $school->university = $universities[$i];
            $school->period = $periods[$i];
            $school->save();
        }
    }

    /**
     * @param array $skills
     * @return void
     *
     */
    public static function saveSkill(array $skills)
    {
        foreach ($skills as $skill) {
            $skl = new Skill;
            $skl->skill = $skill;
            $skl->save();
        }
    }
/**
 * @param string $phone,
 * @param string $email,
 * @param string $address,
 * @param string $name,
 * @param string $profile,
 * @param string $experience
 * @return void
 *
 * */
    public static function saveMainInfo(
        string $phone,
        string $email,
        string $address,
        string $name,
        string $profile,
        string $experience
    )
    {
        $info = Information::find(1);
        $info->phone = $phone;
        $info->email = $email;
        $info->address = $address;
        $info->name = $name;
        $info->profile = $profile;
        $info->experience = $experience;
        $info->save();
    }

    /**
     * @param Request $request
     * @return void
     *
     */
    public static function savePhoto(Request $request)
    {
        if ($request['Photo'] != '') {
            $file = $request->file('Photo');
            $file->move('Photo/', 'avatar.png');
        }
    }

    /**
     * @param Request $request
     * @return string
     *
     */
    private static function photoPath(Request $request)
    {
        if ($request['Photo'] != '') {
            return 'Photo/avatar.png';
        } else {
            return '';
        }
    }

    /**
     * @param Request $request
     * @return void
     *
     */
    public static function update(Request $request)
    {
        $path = self::photoPath($request);

        $info = Information::find(1);

        if (is_null($info)) {
            $info = new Information;
            $info->id = 1;
            $info->save();
        }
        if ($request['Photo'] != '') {
            $info->photo = $path;
        }

        ResumeService::saveSocial($request['Linked']);
        ResumeService::saveSchool($request['Degree'], $request['University'], $request['Period']);
        ResumeService::saveSkill($request['Skill']);
        ResumeService::savePhoto($request);
        ResumeService::saveMainInfo($request['Phone'], $request['Mail'], $request['Address'], $request['Name'], $request['Profile'], $request['Experience']);
    }
}
