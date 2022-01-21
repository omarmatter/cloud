@extends('layouts.master')
@section('content')
				<!-- row opened -->
				<div class="row row-sm">

					<!-- /Col -->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">تعديل موظف جديد</h3>
							</div>
							<div class="card-body">
                                <form action="{{ route('employee.update',$employee->id) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col">
                                            <label for="inputName" class="control-label">نوع الوظيفة</label>
                                            <select name="job_type" class="form-control SlectBox">
                                                <option value="" selected disabled>حدد نوع الوظيفة</option>
                                                @foreach ($jobType as $job_type)
                                                    <option value="{{$job_type->id}}" @if($job_type->id == $employee->job_type_id) selected @endif>{{ $job_type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label for="inputName" class="control-label">إسم الموظف</label>
                                            <input class="form-control fc-datepicker" name="employee_name"
                                                   type="text" value="{{ $employee->name }}" required>
                                        </div>
                                    </div>

<br>
                                    <div class="row">
                                        <div class="col">
                                            <label for="inputName" class="control-label">المسمى الوظيفي</label>
                                            <input class="form-control fc-datepicker" name="job_title"
                                                   type="text" value="{{ $employee->job_title }}" required>
                                        </div>

                                        <div class="col" hidden>
                                            <label for="inputName" class="control-label">الإيميل الشخصي</label>
                                            <input class="form-control fc-datepicker" name="employee_email"
                                                   type="text" value="{{ $employee->email }}" required>
                                        </div>
                                        <div class="col">
                                            <label for="inputName" class="control-label">العنوان</label>
                                            <input class="form-control fc-datepicker" name="employee_address"
                                                   type="text" value="{{ $employee->address }}" required>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">


                                        <div class="col">
                                            <label for="inputName" class="control-label">الراتب</label>
                                            <input class="form-control fc-datepicker" name="employee_salary"
                                                   type="text" value="{{ $employee->salary }}" required>
                                        </div>

                                        <div class="col">
                                            <label for="inputName" class="control-label">طريقة دفع الراتب</label>
                                            <select name="payment_method" class="form-control SlectBox">
                                                <!--placeholder-->
                                                <option value="" selected disabled>حدد الطريقة</option>
                                                @if($employee->payment_type == 'كاش')
                                                    <option value="كاش" selected>كاش</option>
                                                @else
                                                    <option value="كاش">كاش</option>
                                                @endif
                                                @if($employee->payment_type == 'شيك')
                                                    <option value="شيك" selected>شيك</option>
                                                @else
                                                    <option value="شيك">شيك</option>
                                                @endif
                                                @if($employee->payment_type == 'visa')
                                                    <option value="visa" selected>visa</option>
                                                @else
                                                    <option value="visa">visa</option>
                                                @endif
                                            </select>
                                        </div>

                                    </div>
                                    <br>

                                    <br>
                                    <br>
                                    <div class="card-footer d-sm-flex">
                                        <div class="btn-list mr-auto">
                                            <button type="submit" class="btn btn-primary btn-space">تعديل</button>
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
