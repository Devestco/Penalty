<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link href="{{asset('libs/dropify/dist/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
    <title>تسجيل جديد</title>
</head>
<body class="sub-form">
<navigation id="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <a class="navbar-brand" href="{{route('landing')}}"><img src="{{asset('img/logo.png')}}" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('landing')}}#">خدماتنا</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('landing')}}#about">من نحن</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('landing')}}#prices">خطة الاسعار</a>
                            </li>


                        </ul>
                        <form class="form-inline my-2 my-lg-0 ">
                            <a href="{{route('admin.home')}}" class="btn login-btn  my-2 my-sm-0" type="submit">تسجيل الدخول</a>
                            <a href="{{route('register')}}" class="btn inroll-btn my-2 my-sm-0">
                                اشترك الان
                            </a>

                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>

</navigation>
<div class="main-form">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" data-parsley-validate novalidate>
                    @csrf
                    <div class="coach-info">




                        <div class="form-group">
                            <label for="alloptions" class="control-label">الاسم</label>
                            <input required type="text"  class="form-control @error('name') is-invalid @enderror" placeholder="الإسم" maxlength="25" name="name" id="alloptions" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="useremail">البريد الإلكتروني</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="useremail" placeholder="البريد الإلكترونى" autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label">رقم الجوال</label>
                            <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" required maxlength="13" placeholder="رقم الجوال" />
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="userpassword">كلمة المرور</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="userpassword" placeholder="كلمة السر">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="userpassword">تأكيد كلمة المرور </label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="userconfirmpassword" placeholder="تأكيد كلمة السر">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">الشعار</label>
                            <div class="card-box">
                                <input name="avatar" id="input-file-now-custom-1 image" type="file" class="dropify"   data-default-file="{{asset('img/logo.png')}}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">الدولة</label>
                            <select name="country_id" class="form-control select2">
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">المدينة</label>
                            <input type="text" class="form-control" maxlength="25" name="city" id="alloptions" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">الحي</label>
                            <input type="text" class="form-control" maxlength="25" name="district" id="alloptions" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">كيف سمعت عنا</label>
                            <select name="ad_id" class="form-control select2">
                                @foreach($ads as $ad)
                                    <option value="{{$ad->id}}">{{$ad->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="card-box">
                            <h4 class="header-title mt-0 mb-3">الموقع</h4>
                            <script async defer
                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjBZsq9Q11itd0Vjz_05CtBmnxoQIEGK8&&callback=initMap" type="text/javascript">
                            </script>
                            <div id="map" class="gmaps" style="position: relative; overflow: hidden;height: 300px"></div>
                            <input name="lat" type="hidden" id="lat">
                            <input name="lng" type="hidden" id="lng">
                        </div>
                        <script>
                            function initMap() {
                                map = new google.maps.Map(document.getElementById('map'), {
                                    // center: {lat:  window.lat   , lng:  window.lng   },
                                    center: {lat: 24.774265, lng: 46.738586},
                                    zoom: 15,
                                    mapTypeId: 'roadmap'
                                });
                                var marker;
                                google.maps.event.addListener(map, 'click', function (event) {
                                    map.setZoom();
                                    var mylocation = event.latLng;
                                    map.setCenter(mylocation);
                                    $('#lat').val(event.latLng.lat());
                                    $('#lng').val(event.latLng.lng());
                                    setTimeout(function () {
                                        if (!marker)
                                            marker = new google.maps.Marker({position: mylocation, map: map});
                                        else
                                            marker.setPosition(mylocation);
                                    }, 600);
                                });
                            }
                        </script>
                        <div class="form-group">
                            <label class="control-label">حجم الأكاديمية</label>
                            <select id="academy_size_id" name="academy_size_id" class="form-control select2">
                                @foreach($academy_sizes as $academy_size)
                                    <option value="{{$academy_size->id}}">{{$academy_size->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="coach-info" id="single-coach-academy">
                        <h2>بيانات المدرب</h2>
                        <div class="form-group">
                            <label class="control-label">الرياضة</label>
                            <select name="sport_id" class="form-control select2">
                                @foreach($sports as $sport)
                                    <option value="{{$sport->id}}">{{$sport->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">الجنسية</label>
                            <input required type="text" class="form-control" maxlength="25" name="nationality" id="alloptions" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">رقم الهوية</label>
                            <input required type="text" class="form-control" maxlength="50" name="nationality_id" id="alloptions" />
                        </div>
                    </div>
                    <button class="btn sub-btn" type="submit">اشترك الان</button>
                </form>
            </div>
            <div class="col-md-6">
                <img src="{{asset('img/ILLUSTRATION1.svg')}}" class="form-img" alt="">
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
<script src="{{asset('js/all.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

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
<script>
    $('#academy_size_id').change(function () {
        if ($('#academy_size_id').val()=='1'){
            $('#single-coach-academy').removeAttr('hidden');
        }else{
            $('#single-coach-academy').attr('hidden', 'hidden');
        }
    });
</script>
{{--<script>--}}
{{--    function initMap() {--}}
{{--        map = new google.maps.Map(document.getElementById('map'), {--}}
{{--            // center: {lat:  window.lat   , lng:  window.lng   },--}}
{{--            center: {lat: 24.774265, lng: 46.738586},--}}
{{--            zoom: 15,--}}
{{--            mapTypeId: 'roadmap'--}}
{{--        });--}}
{{--        var marker;--}}
{{--        google.maps.event.addListener(map, 'click', function (event) {--}}
{{--            map.setZoom();--}}
{{--            var mylocation = event.latLng;--}}
{{--            map.setCenter(mylocation);--}}
{{--            $('#lat').val(event.latLng.lat());--}}
{{--            $('#lng').val(event.latLng.lng());--}}
{{--            setTimeout(function () {--}}
{{--                if (!marker)--}}
{{--                    marker = new google.maps.Marker({position: mylocation, map: map});--}}
{{--                else--}}
{{--                    marker.setPosition(mylocation);--}}
{{--            }, 600);--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
</body>
</html>
