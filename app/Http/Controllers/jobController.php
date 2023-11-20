<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Rap2hpoutre\FastExcel\FastExcel;

class jobController extends Controller
{
    public function createJob(Request $request)
    {
        $newJob = Job::create([
           'title' => $request->title,
           'description' => $request->description,
            'status' => 1,
            'user_id' => $request->user,
        ]);
        return redirect('/selectuser');
    }

    public function jobForm()
    {
        return view('newjob');
    }

    public function getJob(Request $request)
    {
        if (Auth::user()->user_role == null) {
            $getuserid = Auth::user()->id;
        }else{
            $getuserid = $request->users;
        }
        $getuserjobs = User::findOrFail($getuserid)->getJobs->sortDesc();
            return view('showjob', compact('getuserjobs'));
    }

    public function selectUser()
    {
        $users = User::all();
        return view('auth.selectuser', compact('users'));
    }

    public function deleteJob(Request $request, $id)
    {
        $deljob = Job::findOrFail($id);
        $deljob->delete();
        return redirect('/selectuser');
    }
    public function updateJob(Request $request, $id)
    {
        $upjob = Job::findOrFail($id);
        $upjob->update([
            'status' => 2
        ]);
        return redirect('/selectuser');
    }

    public function excelExport()
    {
        if (Auth::user()->user_role != 1) {
            $me = \Illuminate\Support\Facades\Auth::user()->id;
            $getjobs = \App\Models\User::find($me)->getJobs;
        }else{
            $getjobs  = Job::all();
        }
        return (new FastExcel($getjobs))->download('TasksList.xlsx');
    }

}
