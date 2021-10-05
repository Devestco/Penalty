<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('web/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('web/css/main.css')}}">

    <title>mosarek</title>
</head>
<body>

<header>
    <navigation id="navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light ">
                        <a class="navbar-brand" href="{{route('landing')}}"><img src="{{asset('web/images/logo.png')}}" alt="logo"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">



                            </ul>
                            <form class="form-inline my-2 my-lg-0 ">



                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </navigation>
</header>

<div class="first">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="btola">بطولة مشارك<br> للبلايستيشن اكتوبر 2021</h1>
            </div>
            <div class="col-md-6"></div>

        </div>
    </div>
</div>
<div class="second">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="btola dis">قم بالأشتراك في بطولة مشارك للبلايستيشن  2021 بلعبة FIFA 2021
                </h1>
                <a href="{{route('player.register')}}" class="btn btn-primary inroll-btn web">اشترك الان</a>
            </div>
            <div class="col-md-6">
                <div class="row places">
                    <div class="col-md-12">
                        <div class="place place1">
                            <h2>المركز الاول</h2>
                            <h1 style="font-weight: bold;">3000 ريال</h1>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 place-one">
                    <div class="col-md-6">
                        <div class="place place2">
                            <h2>المركز الثانى</h2>
                            <h1  style="font-weight: bold;">2000 ريال</h1>
                        </div>
                    </div>
                    <div class="col-md-6 third">
                        <div class="place place3">
                            <h2>المركز الثالث</h2>
                            <h1  style="font-weight: bold;">1000 ريال</h1>
                        </div>
                    </div>
                    <a href="{{route('player.register')}}" class="btn btn-primary inroll-btn mopile">اشترك الان</a>

                </div>

            </div>
        </div>
    </div>
</div>
<script src="{{asset('web/js/jquery-3.5.1.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<script src="{{asset('web/js/all.min.js')}}"></script>
</body>
</html>
