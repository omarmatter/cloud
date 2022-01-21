@extends('layouts.master')


@section('content')
				<!-- row opened -->
				<div class="row row-sm">

					<!-- /Col -->
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">إرسال راتب جديد</h3>
							</div>

                            @if ($errors->any())
                                <ul style="color: darkred">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

							<div class="card-body">
                                <form action="{{ url('salary/store') }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col">
                                            <label for="inputName" class="control-label">الفئة</label>
                                            <select name="employee_id" class="form-control SlectBox">
                                                <!--placeholder-->
                                                <option value="" selected disabled>حدد الموظف</option>
                                                @foreach ($employee as $Employee)
                                                    <option value="{{$Employee->id}}">{{ $Employee->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>

                                        <div class="row">
                                        <div class="col">
                                            <label for="inputName" class="control-label">تاريخ إرسال الراتب</label>
                                            <input class="form-control fc-datepicker" name="send_date"
                                                   type="date" required>
                                        </div>

                                        <div class="col">
                                            <label for="inputName" class="control-label">المبلغ المرسل</label>
                                            <input class="form-control" name="employee_salary"
                                                   type="text" required>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class="col">
                                        <label for="inputName" class="control-label">طريقة دفع الراتب</label>
                                            <select name="payment_method" class="form-control SlectBox">
                                                <!--placeholder-->
                                                <option value="" selected disabled>حدد الطريقة</option>
                                                <option value="كاش">كاش</option>
                                                <option value="شيك">شيك</option>
                                                <option value="visa">visa</option>
                                            </select>
                                        </div>

                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class="col">
                                        <label for="inputName" class="control-label">وصف الدفعة</label>
                                            <textarea  class="form-control"  id="salary_description" name="salary_description" rows="4" cols="50">

                                                </textarea>
                                        </div>

                                    </div>

                                    <br>
                                    <div class="card-footer d-sm-flex">
                                        <div class="btn-list mr-auto">
                                            <button type="submit" class="btn btn-primary btn-space">إرسال راتب جديد</button>
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

