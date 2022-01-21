<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Requests\EmployeeRequest;
use App\Models\employee;
use App\Models\holidays;
use App\Models\jobType;
use App\Models\salary;
use App\Models\User as ModelsUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_name == "admin") {
            $employee = employee::with('jobType')->get();
            return View("admin.employee.index",compact('employee'));

        }else
            return View("employee.salaries.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobType = jobType::all();
        return View("admin.employee.create",compact('jobType'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    $user=    User::create([
            'name' =>$request->employee_name,
            'email' =>$request->employee_email,
            'role_name' =>'employee' ,
            'password'=>Hash::make($request->password),
        ]);

        // $userData = user::where('name', $request->employee_name)->get();

        $employee = new employee();
        $employee->id =  $user->id;
        $employee->name = $request->employee_name;
        $employee->job_title = $request->job_title;
        $employee->email = $request->employee_email;
        $employee->address = $request->employee_address;
        $employee->salary = $request->employee_salary;
        $employee->job_type_id = $request->job_type;
        $employee->payment_type = $request->payment_method;
        $employee->save();
        toastr()->success('Data has been saved successfully!');

        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobType = jobType::all();
        $employee = employee::find($id);
        return View("admin.employee.edit",compact("employee",'jobType','id'));
    }


    public function edit(employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee_name = $request['employee_name'];
        $job_title = $request['job_title'];
        $employee_email = $request['employee_email'];
        $employee_address = $request['employee_address'];
        $employee_salary = $request['employee_salary'];
        $job_type = $request['job_type'];
        $payment_method = $request['payment_method'];
        $employee = employee::find($id);
        $employee ->name = $employee_name;
        $employee ->job_title = $job_title;
        $employee ->email = $employee_email;
        $employee ->address = $employee_address;
        $employee ->salary = $employee_salary;
        $employee ->job_type_id = $job_type;
        $employee ->payment_type = $payment_method;

        $employee->save();
        toastr()->success('Updated Success');
        if (Auth::user()->role_name == "admin") {
            return redirect('/employee');
        }else{


            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        employee::find($id)->delete();
        toastr()->success('Deleted employee!');

        return redirect()->back();
    }
}
