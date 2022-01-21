    @extends('layouts.master')
    @section('content')
    <!-- row opened -->
    <div class="row row-sm">

        <!-- /Col -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إضافة موظف جديد</h3>
                </div>

                @if ($errors->any())
                    <ul style="color: darkred">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="card-body">
                    <form action="{{route('employee.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">نوع الوظيفة</label>
                                <select name="job_type" class="form-control SlectBox">
                                    <option value="" selected disabled>حدد نوع الوظيفة</option>
                                    @foreach ($jobType as $job_type)
                                        <option value="{{$job_type->id}}">{{ $job_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">إسم الموظف</label>
                                <input class="form-control fc-datepicker" name="employee_name"
                                       type="text" required>
                            </div>
                        </div>

<br>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">المسمى الوظيفي</label>
                                <input class="form-control fc-datepicker" name="job_title"
                                       type="text" required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">الإيميل الشخصي</label>
                                <input class="form-control fc-datepicker" name="employee_email"
                                       type="email" required>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">العنوان</label>
                                <input class="form-control fc-datepicker" name="employee_address"
                                       type="text" required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">الراتب</label>
                                <input class="form-control fc-datepicker" name="employee_salary"
                                       type="number" required>
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
                            <div class="col">
                                <label for="inputName" class="control-label">كلمة السر</label>
                                <input class="form-control fc-datepicker" name="password"
                                       type="text" required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="card-footer d-sm-flex">
                            <div class="btn-list mr-auto">
                                <button type="submit" class="btn btn-primary btn-space">إضافة</button>
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
