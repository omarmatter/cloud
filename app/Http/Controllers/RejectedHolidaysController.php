<?php

namespace App\Http\Controllers;

use App\Models\holidays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RejectedHolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $holiday = holidays::where("status","2")->get();
            return View("employee.rejected_holidays.index", compact('holiday'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public function update(Request $request, holidays $holidays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function destroy(holidays $holidays)
    {
        //
    }
}
