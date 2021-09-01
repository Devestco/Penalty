@extends('layouts.master')
@section('title') عرض الكل @endsection
@section('css')
    <link href="{{ URL::asset('/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
    @component('common-components.breadcrumb')
         @slot('title') الأكاديميات  @endslot
         @slot('li_1') عرض الكل  @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
{{--                    <h4 class="card-title">Default Datatable</h4>--}}
{{--                    <p class="card-title-desc">DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.--}}
{{--                    </p>--}}
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>الدولة</th>
                                <th>حجم الأكاديمية</th>
                                <th>الشعار</th>
                                <th>العمليات المتاحة</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($rows as $row)
                            <tr>
                                <td>{{$row->user->name}}</td>
                                <td>{{$row->country->name}}</td>
                                <td>{{$row->academy_size->name}}</td>
                                <td data-toggle="modal" data-target="#imgModal{{$row->id}}">
                                    <img width="50px" height="50px" class="img_preview" src="{{ $row->user->avatar}}">
                                </td>
                                <div id="imgModal{{$row->id}}" class="modal fade" role="img">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <img data-toggle="modal" data-target="#imgModal{{$row->id}}" class="img-preview" src="{{ $row->user->avatar}}" style="max-height: 500px">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <td>
                                    <div class="button-list">
                                        <a href="{{route('admin.academy.show',$row->id)}}">
                                            <button class="btn btn-info waves-effect waves-light"> <i class="fa fa-eye mr-1"></i> <span>عرض</span> </button>
                                        </a>

                                        <form class="reject" data-href="{{ route('admin.academy.reject',[$row->id]) }}" data-id="{{$row->id}}">
                                            @csrf
                                            <button class="btn btn-danger waves-effect waves-light"> <i class="fa fa-archive mr-1"></i> <span>رفض</span> </button>
                                        </form>
                                        <form class="accept" data-id="{{$row->id}}" data-href="{{ route('admin.academy.accept',[$row->id]) }}">
                                            @csrf
                                            <button class="btn btn-success waves-effect waves-light"> <i class="fa fa-user-clock mr-1"></i> <span>قبول</span> </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    @endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).on('click', '.reject', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'من فضلك اذكر سبب الرفض',
                input: 'text',
                showCancelButton: true,
                confirmButtonText: 'رفض',
                cancelButtonText: 'الغاء',
                showLoaderOnConfirm: true,
                preConfirm: (reject_reason) => {
                    $.ajax({
                        url: $(this).data('href'),
                        type:'GET',
                        data: {reject_reason}
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then(() => {
                location.reload(true);
            })
        });
        $(document).on('click', '.accept', function (e) {
            e.preventDefault();
            Swal.fire({
                title: "هل انت متأكد من القبول ؟",
                text: "تأكد من اجابتك قبل التأكيد!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-info',
                confirmButtonText: 'نعم , قم بالقبول!',
                cancelButtonText: 'ﻻ , الغى عملية القبول!',
                closeOnConfirm: false,
                closeOnCancel: false,
                preConfirm: () => {
                    $.ajax({
                        url: $(this).data('href'),
                        type:'GET',
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then(() => {
                location.reload(true);
            })
        });
    </script>
@endsection
