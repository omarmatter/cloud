@extends('layouts.master')

@section('content')

   
    <!-- row -->
    <div class="row">


        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">صاحب الطلب</th>
                                <th class="border-bottom-0">سبب الطلب</th>
                                <th class="border-bottom-0">تاريخ الطلب</th>
                                <th class="border-bottom-0">مدة الإجازة</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($holiday as $Holiday)
                                <?php $i++; ?>
                                <tr>
                                        <th class="border-bottom-0" style="padding-right: 32px">{{ $i }}</th>
                                        <th class="border-bottom-0" style="padding-right: 32px">{{ $Holiday->employee->name }}</th>
                                        <th class="border-bottom-0" style="padding-right: 32px">{{ $Holiday->reason }}</th>
                                        <th class="border-bottom-0" style="padding-right: 32px">{{ $Holiday->Payment_Date }}</th>
                                        <th class="border-bottom-0" style="padding-right: 32px">{{ $Holiday->duration_of_vacation }}</th>
                                    <td>
                                        @if($Holiday->status == 0)

                                            <button class="btn btn-outline-primary btn-sm" data-effect="effect-scale"
                                                    data-toggle="modal" data-target="#editProduct"><a href="{{ url('holiday/accept/'.$Holiday->id) }}">قبول</a></button>

                                            <button class="btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                                    data-toggle="modal" data-target="#modaldemo9" data>رفض</button>

                                        @elseif($Holiday->status == 1)
                                            <h6 class="border-bottom-0" style="padding-right: 24px; color: #0a7ffb">تم القبول</h6>
                                        @else
                                            <h6 class="border-bottom-0" style="padding-right: 24px; color: red">مرفوضة</h6>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <!-- delete -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">رفض الإجازة</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                      type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ url('holiday/reject/') }}" method="post">
                        @method("PATCH")
                        @csrf
                        <div class="modal-body">
                            <p>الرجاء توضيح سبب رفض الإجازة ؟</p><br>
                            <input type="hidden" name="holiday_id" id="holiday_id" value="{{ $Holiday->id ?? 1 }}">
                            <textarea  class="form-control"  id="reject_reason" name="reject_reason" rows="4" cols="50">

                            </textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تأكيد</button>
                        </div>
                </form>
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
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>


    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var section_name = button.data('section_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').val(section_name);
        })
    </script>

@endsection
