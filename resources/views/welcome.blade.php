<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
        <script src="{{ asset('js/app.js')  }}"></script>
    </head>
    <body dir="rtl">
        <div class="container">
            <form style="padding: 30px" action="#" method="POST">
                <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" placeholder="نام کاربری خود را وارد کنید">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" placeholder="پسورد خود را وارد کنید">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col"><button class="btn btn-outline-success btn-block btn-lg">ورود </button></div>
                    <div class="col"><a href="project" class="btn btn-outline-primary btn-block btn-lg">افزودن پروژه</a></div>
                </div>
            </form> 
            {{-- <form action="data_table" method="get"> --}}
            <form action="{{route('table')}}" method="get">
                <div class="row">
                    <button class="btn btn-secondary btn-block btn-lg">
                        نمایش پروژه ها
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>
