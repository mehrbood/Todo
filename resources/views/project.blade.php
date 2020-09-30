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
        <div class="container-fluid">
                {{-- <form action="create_new_project" method="post" style="padding: 30px">  --}}
            <form action="{{route('create')}}" method="post" style="padding: 30px">
                @csrf
                @if ($errors -> any())        
                <ul class="list-group" style="text-align: right;">
                    <li class="list-group-item active">مقادیر زیر الزامی است</li>
                    @foreach ($errors->all() as $item)
                <li class="list-group-item list-group-item-danger">{{$item}}</li>
                @endforeach
                </ul> 
                @endif
                <div class="row" style="margin-top:20px">
                    <div class="col">
                        <input name="pg_name" type="text"  class="form-control" placeholder="نام پروژه ">
                      </div>
                      <div class="col">
                        <input name="pg_time" type="text" class="form-control" placeholder="زمان پروژه">
                      </div>
                      <div class="col">
                        <input name="pg_content" type="text" class="form-control" placeholder="محتوای پروژه">
                      </div>
                      <div class="col">
                        <input name="pg_point" type="text" class="form-control" placeholder="نکته پروژه (اختیاری)">
                      </div>
                      <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01" name="operator">وضعیت پروژه</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="operator" >
                              <option selected>
                                  @if (empty($item->operation))
                                      انتخاب وضعیت
                                      @else
                                      {{$item->operation}}
                                  @endif
                              </option>
                              <option value="InProgress">در حال انجام</option>
                              <option value="Done">انجام شده</option>
                              <option value="Abored">لغو شده</option>
                            </select>
                          </div>
                      </div>
                </div>
                <div class="row">
                    <div class="col"><button class="btn btn-outline-success btn-block btn-lg" style="margin-top: 20px">افزودن پروژه </button></div>
                </div>
            </form>
            <form action="data_table" method="get">
                <div class="col">
                    <button class="btn btn-outline-secondary btn-block btn-lg" style="margin-top: 20px">مشاهده اطلاعات ثبت شده  </button>
                </div>
            </form>
        </div>
    </body>
</html>
