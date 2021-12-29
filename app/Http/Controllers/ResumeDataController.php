<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\User;
use App\Services\ResumeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeDataController extends Controller
{
    public function index()
    {
        return view('main', $this->getDataForEdit());
    }

    public function editIndex()
    {
        if (!Auth::user()) {
            return redirect('/');
        }

        return view('edit', $this->getDataForEdit());
    }

    public function update(Request $request)
    {
        /* @var User $user */
        $user = Auth::user();

        if (!$user || !$user->is_admin) {
            return view('main', $this->getDataForEdit());
        }

        ResumeService::update($request);

        return view('main', $this->getDataForEdit());
    }

    private function getDataForEdit()
    {
        return [
            'info' => ResumeService::mainInfo(),
            'skills' => ResumeService::skills(),
            'degries' => ResumeService::degries(),
            'socials' => ResumeService::socials(),
            'periods' => ResumeService::periods(),
            'universities' => ResumeService::university()
        ];
    }

}
