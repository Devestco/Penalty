@extends('layouts.master')
@section('title') لوحة التحكم @endsection
@section('css')
    <link href="{{URL::asset('/libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('common-components.breadcrumb')
         @slot('title') لوحة التحكم   @endslot
         @slot('title_li') مرحبا بك في {{config('app.name', 'Laravel')}} Dashboard   @endslot
    @endcomponent
    @if(auth()->user()->type=='COACH')
        @include('common-components.coach-calender')
    @else
        @include('common-components.admin-charts')
    @endif
@endsection
@section('script')
        <script src="{{URL::asset('/libs/moment/moment.min.js')}}"></script>
        <script src="{{URL::asset('/libs/fullcalendar/fullcalendar.min.js')}}"></script>
        <script src="{{URL::asset('/js/pages/calendar.init.js')}}"></script>

        <!-- plugin js -->
        <script src="{{ URL::asset('libs/apexcharts/apexcharts.min.js')}}"></script>
        <!-- jquery.vectormap map -->
        <script src="{{ URL::asset('libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>
        <!-- Calendar init -->
        <script src="{{ URL::asset('js/pages/dashboard.init.js')}}"></script>

        <script src="{{ URL::asset('libs/datatables/datatables.min.js')}}"></script>
        <script src="{{ URL::asset('libs/jszip/jszip.min.js')}}"></script>
        <script src="{{ URL::asset('libs/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{ URL::asset('js/pages/datatables.init.js')}}"></script>
        <script>
            let colors=JSON.parse($('#data_groups').attr('data-colors'));
            let first_data=JSON.parse($('#data_groups').attr('data-data'));
            let terms=JSON.parse($('#data_groups').attr('data-terms'));
            var options = {
                series: first_data,
                chart: {
                    height: 350,
                    type: 'area'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    type: 'String',
                    categories: terms
                },
            };
            var chart = new ApexCharts(document.querySelector("#line-chart-group-subscribes"), options);
            chart.render();
        </script>
        <script>
            let second_data=JSON.parse($('#data_profits').attr('data-data'));
            var options = {
                series: second_data,
                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: true,
                    stackType: '100%'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: 'bottom',
                            offsetX: -10,
                            offsetY: 0
                        }
                    }
                }],
                xaxis: {
                    categories: terms,
                },
                fill: {
                    opacity: 1
                },
                legend: {
                    position: 'right',
                    offsetX: 0,
                    offsetY: 50
                },
            };
            var chart = new ApexCharts(document.querySelector("#column-chart-profits"), options);
            chart.render();
        </script>
    <script>
        let third_data=JSON.parse($('#data_sports').attr('data-data'));
        let sports=JSON.parse($('#data_sports').attr('data-sports'));
        var options = {
            series: third_data,
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: sports,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#chart-sports"), options);
        chart.render();
    </script>
    <script>
        console.log($('#calendar').data('events'))
    </script>
@endsection
