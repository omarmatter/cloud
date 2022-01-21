<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaryRequest;
use App\Mail\MyTestMail;
use App\Models\employee;
use App\Models\salary;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{

    public function index()
    {
        $salary = salary::with('employee')->get();
        return View("admin.payroll.salary.index",compact('salary'));
    }

    public function employeeIndex(){
        $salary = salary::where('employee_id', Auth::user()->id)->get();
        return View("employee.salaries.index",compact('salary'));
    }

    public function create()
    {
        $employee = employee::all();
        return View("admin.payroll.salary.create",compact('employee'));
    }


    public function store(Request $request)
    {
        $salary = new salary();

        $user = User::find($request->employee_id);
        $salary->employee_id = $request->employee_id;
        $salary->Payment_Date = $request->send_date;
        $salary->salary_description = $request->salary_description;
        $salary->salary = $request->employee_salary;
        $salary->payment_type = $request->payment_method;

        $employee = employee::find($request->employee_id);
        $employee->last_payment_date = $request->send_date;
        $employee->save();



        $salary->save();
        toastr()->success('Data has been saved successfully!');


        return redirect('/salary');
    }


}
