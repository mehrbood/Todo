<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
        <script src="{{ asset('js/app.js')  }}"></script>
    <title>Document</title>
</head>
<body dir="rtl">
    <div class="row">
        <div class="col">
            <table class="table" style="margin: 30px">
                <thead>
                    <tr>
                      <td>#</td>
                      <td>نام پروژه</td>
                      <td>زمان پروژه</td>
                      <td>محتوای پروژه</td>
                      <td>حذف پروژه</td>
                      <td>ویرایش پروژه</td>
                      <td>نکته پروژه</td>
                      <td>عملیات پروژه</td>
                      <td><a href="/">برگشت</a></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->time}}</td>
                            <td>{{$item->content}}</td>
                            <td>
                                <form action="del/{{$item->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">حذف</button>        
                                </form>
                            </td>
                            <td>
                                {{-- <form action="/edit_table/{{$item->id}}" method="get"> --}}
                                <form action="{{route('show_edit',['id' => $item->id])}}" method="get">
                                    @csrf
                                    <button class="btn btn-info">ویرایش</button>        
                                </form>
                            </td>
                            <td>
                                @if (empty($item->point))
                                <form action="/edit_table/{{$item->id}}" method="get">
                                    @csrf
                                    <button class="btn btn-secondary">افزودن نکته</button>        
                                </form>
                                @else
                                    {{$item->point}}
                                @endif
                            </td>
                            <td>
                                @if (empty($item->operation))
                                <form action="/edit_table/{{$item->id}}" method="get">
                                    @csrf
                                    <button class="btn btn-warning">افزودن عملیات</button>        
                                </form>
                                @else
                                    {{$item->operation}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>