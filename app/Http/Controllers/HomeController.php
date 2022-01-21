<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\holidays;
use App\Models\jobType;
use App\Models\salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role_name == "admin") {
            $employee = employee::find(Auth::user()->id);
            $employeeSalary = salary::select()->sum('salary');
            $employeeHoliday = holidays::select()->where('status',0)->count('employee_id');
            $employeeHolidays = holidays::all()->take(3);
            $holiday = holidays::with('employee')->get();
            return view('index',compact('employee','employeeSalary','employeeHoliday','holiday'));
        }else{
            $jobType = jobType::all();
            $employee = employee::find(Auth::user()->id);
            $employeeSalary = salary::select()->where('employee_id',Auth::user()->id)->sum('salary');
            $employeeHoliday = holidays::select()->where('employee_id',Auth::user()->id)->where('status',1)->count('employee_id');
            return view('home',compact('employee','jobType','employeeSalary','employeeHoliday'));

        }
    }


}
