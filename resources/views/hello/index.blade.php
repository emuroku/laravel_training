@extends('layouts.helloapp')

@section('title')
    @parent
    INDEX
@endsection

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>{{ $msg }}</p>

    {{-- エラーメッセージの表示 --}}
    @if (count($errors) > 0)
        <p>入力に問題があります。再入力して下さい。</p>
    @endif
    <form action="/hello" method="post">
        <table>
            {{-- @csrf --}}
            @error('name')
                <tr>
                    <th>ERROR</th>
                    <td>{{ $message }}</td>
                </tr>
            @enderror
            <tr>
                <th>name: </th>
                <td><input type="text" name="name" value="{{ old('name') }}"></td>
            </tr>
            @error('mail')
                <tr>
                    <th>ERROR</th>
                    <td>{{ $message }}</td>
                </tr>
            @enderror
            <tr>
                <th>mail: </th>
                <td><input type="text" name="mail" value="{{ old('mail') }}"></td>
            </tr>
            @error('age')
                <tr>
                    <th>ERROR</th>
                    <td>{{ $message }}</td>
                </tr>
            @enderror
            <tr>
                <th>age: </th>
                <td><input type="text" name="age" value="{{ old('age') }}"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </table>
    </form>
@endsection



{{-- <html>

<head>
    <title>Hello/Index</title>
    <style>
        body {
            font-size: 16pt;
            color: #999;
        }

        h1 {
            font-size: 50pt;
            text-align: right;
            color: #f6f6f6;
            margin: -20px 0 -30px 0;
            letter-spacing: -4pt;
        }

    </style>
</head>

<body>
    <h1>Blade/Index</h1>
    <p>&#064;whileディレクティブの例</p>
    <ol>
    @php
    $counter = 0;   
    @endphp
    @while ($counter < count($data))
    <li>{{$data[$counter]}}</li>
    @php
    $counter ++;
    @endphp
    @endwhile
    </ol>
</body>

</html> --}}
