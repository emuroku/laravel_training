<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\Mime\Encoder\ContentEncoderInterface;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB; // DBクラスの利用


class HelloController extends Controller
{
    public function index(Request $request){

        $items = DB::table('people')->get();
        return view('hello.index', ['items' => $items]);
<<<<<<< HEAD

=======
>>>>>>> 4f53cac (演算子を使ったれコードの検索処理を追加 #10)
    }

    public function post(Request $request){

        $items = DB::select('select * from people');
        return view('hello.index', ['items'=>$items]);
    }

    public function add(Request $request){
        return view('hello.add');
    }

    public function create(Request $request){
        
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name, mail, age) values
            (:name, :mail, :age)', $param);
        return redirect('/hello');    
    }

    public function edit(Request $request){

        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        
        return view('hello.edit', ['form' => $item[0]]);
    }

    public function update(Request $request){

        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::update('update people set name = :name, mail = :mail, age = :age 
                where id = :id', $param);

        return redirect('/hello');
    }

    public function del(Request $request){

        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        
        return view('hello.del', ['form' => $item[0]]);
    }

    public function remove(Request $request){

        $param = ['id' => $request->id];
        DB::delete('delete from people where id = :id', $param);
        
        return redirect('/hello');
<<<<<<< HEAD

    }

=======
    }    
<<<<<<< HEAD
>>>>>>> e766812 (余計な記述を削除 #10)
=======

    public function show(Request $request){

        $name = $request -> name;
        $items = DB::table('people')
            ->where('name', 'like', '%' . $name . '%')
            ->orWhere('mail', 'like', '%' . $name . '%')
            ->get();
        return view('hello.show', ['items' => $items]);    
    }
>>>>>>> 4f53cac (演算子を使ったれコードの検索処理を追加 #10)
}
