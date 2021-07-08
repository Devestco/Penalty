@extends('layouts.master')

@section('title') لوحة التحكم @endsection

@section('content')

    @component('common-components.breadcrumb')
         @slot('title') لوحة التحكم   @endslot
         @slot('title_li') مرحبا بك في {{config('app.name', 'Laravel')}} Dashboard   @endslot
     @endcomponent

                    <div class="row">
                        <div class="col-xl-3">

     @component('common-components.dashboard-widget')

         @slot('title') الأكاديميات   @endslot
         @slot('iconClass') mdi mdi-flip-horizontal  @endslot
         @slot('price') {{$all_academies_count}}  @endslot
         @slot('percentage') {{round(($new_academies_count/$all_academies_count)*100)}}%   @endslot
         @slot('pClass') progress-bar bg-primary   @endslot
         @slot('pValue') {{round(($new_academies_count/$all_academies_count)*100)}}   @endslot

     @endcomponent

     @component('common-components.dashboard-widget')

         @slot('title') المدربين  @endslot
         @slot('iconClass') mdi mdi-gamepad-square  @endslot
         @slot('price') {{$all_coaches_count}}  @endslot
         @slot('percentage') {{round(($new_coaches_count/$all_coaches_count)*100)}}%   @endslot
         @slot('pClass') progress-bar bg-success   @endslot
         @slot('pValue') {{round(($new_coaches_count/$all_coaches_count)*100)}}   @endslot

     @endcomponent

                        </div>

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">اشتراكات اللاعبين</h4>

                                    <div id="line-chart" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">الأرباح</h4>

                                    <div id="column-chart" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">تحليل الأرباح</h4>

                                    <div class="row align-items-center">
                                        <div class="col-sm-6">
                                            <div id="donut-chart" class="apex-charts"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="py-3">
                                                            <p class="mb-1 text-truncate"><i class="mdi mdi-circle text-primary mr-1"></i> Online</p>
                                                            <h5>$ 2,652</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="py-3">
                                                            <p class="mb-1 text-truncate"><i class="mdi mdi-circle text-success mr-1"></i> Offline</p>
                                                            <h5>$ 2,284</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="py-3">
                                                            <p class="mb-1 text-truncate"><i class="mdi mdi-circle text-warning mr-1"></i> Marketing</p>
                                                            <h5>$ 1,753</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">تحليل للجروبات والكورسات</h4>

                                    <div id="scatter-chart" class="apex-charts"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">آراء اللاعبين</h4>
                                    <div class="mb-4">
                                        <h5><span class="text-primary">{{$all_players_count}}</span>+ لاعب</h5>
                                    </div>
                                    <div class="mb-3">
                                        <i class="fas fa-quote-left h4 text-primary"></i>
                                    </div>
                                    <div id="reviewExampleControls" class="carousel slide review-carousel" data-ride="carousel">

                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div>
                                                    <p>To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words</p>
                                                    <div class="media mt-4">
                                                        <div class="avatar-sm mr-3">
                                                            <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                                    J
                                                                </span>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="font-size-16 mb-1">Jessie Mitchell</h5>
                                                            <p class="mb-2">CEO of ABC Company</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div>
                                                    <p>For science, music, sport, etc, Europe uses the same vocabulary languages only differ in their grammar</p>
                                                    <div class="media mt-4">
                                                        <div class="avatar-sm mr-3">
                                                            <img src="images/users/avatar-4.jpg" alt="" class="img-fluid rounded-circle">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="font-size-16 mb-1">Kelly Rivera</h5>
                                                            <p class="mb-2">Web Developer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div>
                                                    <p>The new common language will be more simple and regular than the existing European languages.</p>
                                                    <div class="media mt-4">
                                                        <div class="avatar-sm mr-3">
                                                            <span class="avatar-title bg-soft-primary text-primary rounded-circle">
                                                                    S
                                                                </span>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="font-size-16 mb-1">Simon Hawkins</h5>
                                                            <p class="mb-2">CEO of XYZ Company</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a class="carousel-control-prev" href="#reviewExampleControls" role="button" data-slide="prev">
                                            <i class="mdi mdi-chevron-left carousel-control-icon"></i>
                                        </a>
                                        <a class="carousel-control-next" href="#reviewExampleControls" role="button" data-slide="next">
                                            <i class="mdi mdi-chevron-right carousel-control-icon"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">التحصيلات الشهرية لللاعبين</h4>

                                    <div class="table-responsive">
                                        <table class="table table-centered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Id no.</th>
                                                    <th scope="col">Billing Name</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col" colspan="2">Payment Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>15/01/2020</td>
                                                    <td>
                                                        <a href="#" class="text-body font-weight-medium">#SK1235</a>
                                                    </td>
                                                    <td>Werner Berlin</td>
                                                    <td>$ 125</td>
                                                    <td><span class="badge badge-soft-success font-size-12">Paid</span></td>
                                                    <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>16/01/2020</td>
                                                    <td>
                                                        <a href="#" class="text-body font-weight-medium">#SK1236</a>
                                                    </td>
                                                    <td>Robert Jordan</td>
                                                    <td>$ 118</td>
                                                    <td><span class="badge badge-soft-danger font-size-12">Chargeback</span></td>
                                                    <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>17/01/2020</td>
                                                    <td>
                                                        <a href="#" class="text-body font-weight-medium">#SK1237</a>
                                                    </td>
                                                    <td>Daniel Finch</td>
                                                    <td>$ 115</td>
                                                    <td><span class="badge badge-soft-success font-size-12">Paid</span></td>
                                                    <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>18/01/2020</td>
                                                    <td>
                                                        <a href="#" class="text-body font-weight-medium">#SK1238</a>
                                                    </td>
                                                    <td>James Hawkins</td>
                                                    <td>$ 121</td>
                                                    <td><span class="badge badge-soft-warning font-size-12">Refund</span></td>
                                                    <td><a href="#" class="btn btn-primary btn-sm">View</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="mt-3">
                                        <ul class="pagination pagination-rounded justify-content-center mb-0">
                                            <li class="page-item">
                                                <a class="page-link" href="#">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
@endsection

@section('script')
        <!-- plugin js -->
        <script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- jquery.vectormap map -->
        <script src="{{ URL::asset('libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>

        <!-- Calendar init -->
        <script src="{{ URL::asset('js/pages/dashboard.init.js')}}"></script>
@endsection
