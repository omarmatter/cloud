<?php

namespace App\Http\Controllers;

use App\Http\Requests\HolidayRequest;
use App\Models\employee;
use App\Models\holidays;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_name == "admin") {
            $holiday = holidays::with('employee')->get();
            return View("admin.holidays.index", compact('holiday'));
        }else {
            $holiday = holidays::where('employee_id', Auth::user()->id)->get();
            return View("employee.holidays.index",compact('holiday'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View("employee.holidays.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $holiday = new holidays();
        $holiday->reason = $request->holiday_reason;
        $holiday->duration_of_vacation = $request->duration_of_vacation;
        $holiday->Payment_Date = $request->holiday_date;
        $holiday->employee_id = $request->holiday_employee_id;
        $holiday->status = 0;

        $holiday->save();
        toastr()->success('succsee add');
        return redirect('/holiday');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function show(holidays $holidays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function edit(holidays $holidays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\holidays  $holidays
     * @return \Illuminate\Http\Response
     */

    public function accept($id)
    {

        $holidays = holidays::find($id);
        $user = User::find($holidays->employee_id);

        $holidays ->status = 1;

        $holidays->save();

        toastr()->success('succsee accept');
        return redirect('/holiday');
    }

    public function reject(Request $request)
    {

        $holidays = holidays::find($request->holiday_id);
        $user = User::find($holidays->employee_id);
        $holidays ->rejected_reason = $request->reject_reason;
        $holidays ->status = 2;



        $holidays->save();
        toastr()->success('succsee reject');
        return redirect('/holiday');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        holidays::find($id)->delete();
        toastr()->success('succsee deleted');
        return redirect()->back();
    }
}
