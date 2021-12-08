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
    <tr><th>Name</th><th>Mail</th><th>Age</th></tr>
    @foreach($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
        </tr>
    @endforeach
<<<<<<< HEAD
    </table>                      
=======
    </table>                     
>>>>>>> e766812 (余計な記述を削除 #10)
@endsection
