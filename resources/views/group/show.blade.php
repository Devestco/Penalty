@extends('layouts.master')

@section('title') {{$row->name}} @endsection
@section('css')
    <!-- Bootstrap Rating css -->
    <link href="{{URL::asset('/libs/bootstrap-rating/bootstrap-rating.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('common-components.breadcrumb')
         @slot('title') الجروبات  @endslot
         @slot('li_1') عرض  @endslot
    @endcomponent
        <!-- start row -->
        <div class="row">
                        <div class="col-md-12 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-widgets py-3">
                                        <div class="text-center">
                                            <div class="">
                                                <img src="{{$row->academy->user->avatar}}" alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle">
                                                <div class="online-circle"><i class="fas fa-circle text-success"></i></div>
                                            </div>

                                            <div class="mt-3 ">
                                                <a href="#" class="text-dark font-weight-medium font-size-16">{{$row->academy->user->name}}</a>
                                                <p class="text-body mt-1 mb-1">{{$row->name}}</p>
                                                <span class="badge badge-success">{{$row->sport->name}}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">البيانات العامة</h5>
                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">البريد الإلكتروني</p>
                                        <h6 class="">{{$row->academy->user->email}}</h6>
                                    </div>

                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">الهاتف</p>
                                        <h6 class="">{{$row->academy->user->phone}}</h6>
                                    </div>

                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">العنوان</p>
                                        <h6 class="">{{$row->academy->country->name}}, {{$row->academy->city}}</h6>
                                    </div>

                                    <div class="mt-3">
                                        <p class="font-size-12 text-muted mb-1">تاريخ الإنشاء</p>
                                        <h6 class="">{{\Carbon\Carbon::parse($row->created_at)->format('Y-m-d')}}</h6>
                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-2">المهارات</h5>
                                    <ul class="list-unstyled list-inline language-skill mb-0">
                                        @foreach($row->sport->activities as $activity)
                                            <li class="list-inline-item badge badge-primary"><span>{{$activity->name}}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
            <div class="col-md-12 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>رقم الجوال</th>
                                <th>الصورة الشخصية</th>
                                @foreach($row->sport->activities as $activity)
                                    <th> متوسط مهارة {{$activity->name}}</th>
                                @endforeach
                                <th>العمليات المتاحة</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($players as $player)
                                <tr>
                                    <td>{{$player->user->name}}</td>
                                    <td>{{$player->user->phone}}</td>
                                    <td data-toggle="modal" data-target="#imgModal{{$player->id}}">
                                        <img width="50px" height="50px" class="img_preview" src="{{ $player->user->avatar}}">
                                    </td>
                                    <div id="imgModal{{$player->id}}" class="modal fade" role="img">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img data-toggle="modal" data-target="#imgModal{{$player->id}}" class="img-preview" src="{{ $player->user->avatar}}" style="max-height: 500px">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach($row->sport->activities as $activity)
                                        <td> % {{$player->getAverageOfActivityInModel('Group',$row->id,$activity->id)}}</td>
                                    @endforeach

                                    <td>
                                        <div class="button-list">
                                            <button class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target="#rate-{{$player->id}}"> <i class="fa fa-calendar-times"></i> <span>تقييم جديد</span> </button>
                                            <div class="modal fade" id="rate-{{$player->id}}" tabindex="-1" role="dialog" aria-labelledby="rate-{{$player->id}}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="rate-{{$player->id}}">قم بتقييم جديد لهذا اللاعب</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form enctype="multipart/form-data" method="POST" action="{{ route('admin.coach.rate',$player->id) }}">
                                                                @csrf
                                                                <input type="hidden" name="model" value="Group">
                                                                <input type="hidden" name="model_id" value="{{$row->id}}">
                                                                <input type="hidden" name="coach_id" value="{{auth()->id()}}">
                                                                <input type="hidden" name="player_id" value="{{$player->id}}">
                                                                <div class="form-group row">
                                                                    @foreach($row->sport->activities as $activity)
                                                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{$activity->name}}</label>
                                                                        <div class="col-md-6">
                                                                            <input type="hidden" name="rate_activity_{{$activity->id}}"  class="rating" data-filled="mdi mdi-star text-primary" data-empty="mdi mdi-star-outline text-muted" />
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <div class="form-group row mb-0">
                                                                    <div class="col-md-8 offset-md-4">
                                                                        <button type="submit" class="btn btn-primary">
                                                                            تقييم
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


             </div>
        <!-- end row -->
    @endsection

    @section('script')
        <script src="{{ URL::asset('/libs/datatables/datatables.min.js')}}"></script>
        <script src="{{ URL::asset('/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{ URL::asset('/libs/pdfmake/pdfmake.min.js')}}"></script>
        <!-- Datatable init js -->
        <script src="{{ URL::asset('/js/pages/datatables.init.js')}}"></script>
        <!-- Bootstrap rating js -->
        <script src="{{URL::asset('/libs/bootstrap-rating/bootstrap-rating.min.js')}}"></script>
        <script src="{{URL::asset('/js/pages/rating-init.js')}}"></script>
    <!-- apexcharts -->
    <script src="{{ URL::asset('/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ URL::asset('/js/pages/profile.init.js')}}"></script>
    @endsection
