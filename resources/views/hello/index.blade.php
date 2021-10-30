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
    <table>
        <tr>
            <th>Name</th>
            <th>Mail</th>
            <th>Age</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>{{$item->name}}</td>    
                <td>{{$item->mail}}</td>    
                <td>{{$item->age}}</td>
            </tr>
        @endforeach
    </table>                
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
