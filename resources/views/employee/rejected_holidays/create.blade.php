@extends('layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@section('title')
    تقديم طلب إجازة جديد
@stop

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">الإجازات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تقديم طلب إجازة جديد</span></div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">

					<!-- /Col -->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">تقديم طلب إجازة جديد</h3>
							</div>
							<div class="card-body">
                                <form action="{{ url('holiday/store') }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col">
                                            <label for="inputName" class="control-label">تاريخ الإجازة</label>
                                            <input class="form-control fc-datepicker" name="holiday_date"
                                                   type="date" required>

                                            <input class="form-control" name="holiday_employee_id"
                                                   type="text" value="{{Auth::user()->id}}" hidden>
                                        </div>

                                        <div class="col">
                                            <label for="inputName" class="control-label">مدة الإجازة</label>
                                            <input class="form-control" name="duration_of_vacation"
                                                   type="text" required>
                                        </div>
                                    </div>

<br>
                                    <div class="row">
                                        <div class="col">
                                            <label for="inputName" class="control-label">سبب الإجازة</label>
                                            <textarea  class="form-control"  id="holiday_reason" name="holiday_reason" rows="8" cols="50" required>

                                            </textarea>
                                        </div>

                                    </div>

                                    <br>
                                    <div class="card-footer d-sm-flex">
                                        <div class="btn-list mr-auto">
                                            <button type="submit" class="btn btn-primary btn-space">تقديم الطلب</button>
                                        </div>
                                    </div>
                                </form>
							</div>

						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection
