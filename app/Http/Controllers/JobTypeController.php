<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobTypeRequest;
use App\Models\jobType;
use App\Models\role;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{

    public function index()
    {
        $jobType = jobType::all();
        return View('admin.settings.jobs.index',compact('jobType'));
    }


    public function create()
    {
        return View("admin.settings.jobs.create");
    }


    public function store(Request $request)
    {
        $jobType = new jobType();
        $jobType->name = $request->job_name;
        $jobType->save();
        toastr()->success('succsee add');
        return redirect('/job');
    }


    public function show($id)
    {
        $jobType = jobType::find($id);
        return View("admin.settings.jobs.edit",compact("jobType"));
    }





    public function update(Request $request, $id)
    {
        $name = $request['job_name'];
        $jobType = jobType::find($id);
        $jobType ->name = $name;

        $jobType->save();
        toastr()->success('succsee update');
        return redirect('/job');
    }


    public function destroy($id)
    {
        jobType::find($id)->delete();
        toastr()->success('succsee delete');
        return redirect()->back();
    }


}
