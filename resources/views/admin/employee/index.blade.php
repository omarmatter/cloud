@extends('layouts.master')
@section('content')


    <!-- row -->
    <div class="row">


        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-outline-primary btn-block" data-effect="effect-scale" href="{{url('employee/create')}}">اضافة موظف جديد</a>

                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">اسم الموظف</th>
                                <th class="border-bottom-0">المسمى الوظيفي</th>
                                <th class="border-bottom-0">الإيميل الشخصي</th>
                                <th class="border-bottom-0">القسم</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i = 0; ?>
                            @foreach ($employee as $Employee)
                                <?php $i++; ?>
                                <tr>
                                    <th class="border-bottom-0" style="padding-right: 32px">{{ $i }}</th>
                                    <th class="border-bottom-0" style="padding-right: 32px">{{ $Employee->name }}</th>
                                    <th class="border-bottom-0" style="padding-right: 32px">{{ $Employee->job_title }}</th>
                                    <th class="border-bottom-0" style="padding-right: 32px">{{ $Employee->email }}</th>
                                    <th class="border-bottom-0" style="padding-right: 32px">{{ $Employee->jobType->name }}</th>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm"
                                                data-toggle="modal" data-target="#editProduct"><a href="{{ url('employee/show/'.$Employee->id) }}">تعديل</a></button>

                                        <button class="btn btn-outline-danger btn-sm " data-toggle="modal"
                                                data-target="#deleteProduct"><a href="{{ url('employee/delete/'.$Employee->id) }}" style="color: red" >حذف</a></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
