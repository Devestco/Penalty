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
    <title>mosharek</title>
</head>
<body>
<a href="{{route('landing')}}" class="logo">
    <img src="{{asset('web/images/logo.png')}}" alt="">
</a>
<div class="ads">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('player.register') }}" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">الاسم</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الاسم">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">البريد الالكترونى</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الالكترونى">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputAge">العمر</label>
                        <input type="text" name="age" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="العمر">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputpphone">رقم الهاتف</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="رقم الهاتف">

                    </div>
                    <button type="submit" class="form-button">اشترك الان</button>
                </form>
            </div>
            <div class="col-md-6 text-center  main-cont mopile-mode">
                <p>بطولة مشارك <br> للبلايستيشن اكتوبر 2021</p>
                <p class="small-size">قم بالأشتراك في بطولة مشارك للبلايستيشن 2021 بلعبة FIFA 2021</p>
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
