<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\Mime\Encoder\ContentEncoderInterface;
use App\Http\Requests\HelloRequest;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request){

        $validator = Validator::make($request->query(),[
            'id' => 'required',
            'pass' => 'required',
        ]);

        if($validator->fails()){
            $msg = 'クエリに問題があります';
        }else{
            $msg = 'ID/PASSを受け付けました。フォームを入力してください';
        }

        return view('hello.index', ['msg'=>$msg]);
    }

    public function post(Request $request){
        
       // バリデーションのルール配列を設定
       $rules = [
           'name' => 'required',
           'mail' => 'email',
           'age' => 'numeric',
       ];

       // エラーメッセージ配列を設定
       $messages = [
           'name.required' => '名前は必ず入力して下さい',
           'mail.email' => 'メールアドレスが必要です',
           'age.numeric' =>'年齢を整数で記入して下さい',
           'age.min' => '年齢はゼロ歳以上で記入して下さい',
           'age.max' => '年齢は200歳以下で記入して下さい',
       ];

       // バリデータの呼び出し
       $validator = Validator::make($request->all(), $rules, $messages);

       // sometimesメソッドによるルールの追加
       $validator -> sometimes('age', 'min:0', function($input){
           return is_numeric($input->age);
       });

       $validator -> sometimes('age', 'max:200', function($input){
           return is_numeric($input->age);
       });


       if($validator->fails()){
           return redirect('/hello')
                -> withErrors($validator)
                -> withInput();
       }

       return view('hello.index', ['msg' => '正しく入力されました！']);
    }



    // public function index(Request $request, Response $response){
    //     $html = <<<EOF
    //     <html>
    //     <head>
    //     <title>Hello/Index</title>
    //     <style>
    //     body{font-size: 16pt; color: #999;}
    //     h1{font-size: 120pt; text-align: right; color: #fafafa; margin: -50px 0 -120px 0;}
    //     </style>
    //     </head>
    //     <body>
    //         <h1>Hello</h1>
    //         <h3>Request</h3>
    //         <pre>{$request}</pre>
    //         <h3>Response</h3>
    //         <pre>{$response}</pre>
    //     </body>
    //     </html>
    //     EOF;
    //         $response -> setContent($html);
    //         // $res = $response -> content();
    //         // return $res;    
    //         return $response;
    // }
}
