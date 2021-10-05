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

    <title>mosarek-form</title>
</head>
<body style="height: 100vh;">
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
<div class="form-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h1 class="btola">بطولة مشارك للبلايستيشن اكتوبر 2021</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row justify-content-center flex-column-reverse flex-md-row" style="margin-top: 100px;">
                    <div class="col-md-12">
                        <form id="form" class="contact-form" style="position: relative; direction: rtl ;" method="POST" action="{{ route('player.register') }}" >
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-control mb-3">
                                            <input required type="text" name="name"  class="form-control input"  placeholder="الاسم">
                                        </div>
                                        <div class="form-control mb-3">
                                            <input required type="email" name="email" class="form-control input" placeholder="البريد الالكترونى">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-control mb-3">
                                            <input required type="text" name="phone" class="form-control input" maxlength="13" placeholder="رقم الهاتف">
                                        </div>
                                        <div class="form-control mb-3">
                                            <input required type="text" name="age" class="form-control input"  placeholder="العمر">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 sub-btn">
                                    <button  type="submit" class="btn btn-primary sub-btn"> اشترك الان</button>
                                    <div id="error"></div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</div>
<script src="{{asset('web/js/jquery-3.5.1.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<script src="{{asset('web/js/all.min.js')}}"></script>
</body>
</html>
