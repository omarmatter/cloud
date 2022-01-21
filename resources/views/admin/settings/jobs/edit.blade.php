@extends('layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@section('title')
    تعديل نوع الوظيفة
@stop

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل نوع الوظيفة</span></div>
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
								<h3 class="card-title">تعديل نوع الوظيفة</h3>
							</div>
							<div class="card-body">
                                <form action="{{ url('job/update/'.$jobType->id) }}"  method="post">
                                    @csrf
                                    @method('PUT')
									<div class="form-group">
										<div class="row align-items-center">
											<label class="col-sm-2">النوع</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="job_name" id="job_name" value="{{ $jobType->name }}">
											</div>
										</div>
									</div>
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
@section('js')
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection
