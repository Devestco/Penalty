@extends('layouts.master')
@section('title') تعديل بيانات جروب @endsection
@section('css')
<link href="{{URL::asset('libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}" rel="stylesheet" />
<link href="{{asset('libs/dropify/dist/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
 @component('common-components.breadcrumb')
         @slot('title') الجروبات  @endslot
         @slot('li_1') تعديل بيانات جروب  @endslot
 @endcomponent
 @if($errors->any())
     <div class="alert alert-danger" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
     </div>
 @endif
 <form method="POST" action="{{route('admin.group.update',$row->id)}}" enctype="multipart/form-data" data-parsley-validate novalidate>
     @csrf
     @method('PUT')
        <div class="row">
            <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">البيانات العامة</h4>
                    <div class="form-group">
                        <label class="control-label">الاسم</label>
                        <input value="{{$row->name}}" required type="text" class="form-control" maxlength="25" name="name" id="alloptions" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">السعر</label>
                        <input value="{{$row->price}}" required type="number" class="form-control" name="price" min="0"  />
                    </div>

                    <div class="form-group">
                        <label for="sport_id" class="control-label">الرياضة</label>
                        <select id="sport_id" name="sport_id" class="form-control select2">
                            @foreach($sports as $sport)
                                <option @if($sport->id==$row->sport_id) selected @endif value="{{$sport->id}}">{{$sport->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-0">
                        <label class="control-label">أيام التدريب</label>
                        <select name="days[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
                            <option @if(in_array("Saturday",$row->days)) selected @endif value="Saturday">Saturday</option>
                            <option @if(in_array("Sunday",$row->days)) selected @endif value="Sunday">Sunday</option>
                            <option @if(in_array("Monday",$row->days)) selected @endif value="Monday">Monday</option>
                            <option @if(in_array("Tuesday",$row->days)) selected @endif value="Tuesday">Tuesday</option>
                            <option @if(in_array("Wednesday",$row->days)) selected @endif value="Wednesday">Wednesday</option>
                            <option @if(in_array("Thursday",$row->days)) selected @endif value="Thursday">Thursday</option>
                            <option @if(in_array("Friday",$row->days)) selected @endif value="Friday">Friday</option>
                        </select>
                    </div>

                    @if (in_array('SUPER_ADMIN',auth()->user()->getRoleNames()->toArray()))
                        <div class="form-group">
                            <label class="control-label">الأكاديمية</label>
                            <select name="academy_id" class="form-control select2">
                                @foreach(\App\Models\Academy::all() as $academy)
                                    <option @if($academy->id==$row->id) selected @endif value="{{$academy->id}}">{{$academy->user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        @if(auth()->user()->type=='ADMIN')
                            <input hidden name="academy_id" value="{{auth()->user()->admin->academy->id}}">
                        @else
                            <input hidden name="academy_id" value="{{auth()->user()->academy->id}}">
                        @endif
                    @endif

                    <div class="form-group">
                        <label for="example-time-input">موعد بدأ التدريب</label>
                        <input name="start_time" class="form-control" type="time" value="{{$row->group_days()->first()->start_time}}" id="example-time-input">
                    </div>

                    <div class="form-group">
                        <label class="control-label">عدد ساعات التدريب</label>
                        <input required type="number" class="form-control" name="duration" min="0" value="{{$row->group_days()->first()->duration}}" />
                    </div>

                    <div class="form-group">
                        <label class="control-label">ملاحظات أخري</label>
                        <textarea class="form-control" name="comment">{{$row->group_days()->first()->comment}}</textarea>
                    </div>

                </div>
            </div>
        </div>
            <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">التسجيل</h4>
                    <div class="form-group mb-0">
                        <label class="control-label">المدربين</label>
                        <select name="coaches[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
                            @foreach($coaches as $coach)
                                <option @if(in_array($coach->id,$row->coaches()->pluck('coach_id')->toArray())) selected @endif value="{{$coach->id}}">{{$coach->user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <label class="control-label">اللاعبين</label>
                        <select name="players[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
                            @foreach($players as $player)
                                <option @if(in_array($player->id,$row->players()->pluck('player_id')->toArray())) selected @endif value="{{$player->id}}">{{$player->user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- end select2 -->
        </div>
        </div>
        <div class="row">
            <div class="form-group">
                <button class="btn btn-success waves-effect waves-light mr-12" type="submit">
                    تعديل
                </button>
            </div>
        </div>
    </form>
<!-- end row -->


<!-- end row -->
@endsection

@section('script')

<script src="{{URL::asset('/libs/select2/select2.min.js')}}"></script>
<script src="{{URL::asset('/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{URL::asset('/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{URL::asset('/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
<script src="{{URL::asset('/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>

<!-- form advanced init -->
<script src="{{URL::asset('/js/pages/form-advanced.init.js')}}"></script>

<script src="{{asset('/libs/dropify/dist/js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });
        // Used events
        var drEvent = $('#input-file-events').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
@endsection
