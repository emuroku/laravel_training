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
        }
        return view('hello.index', ['items'=>$items]);
    }
    public function post(Request $request){
        
       $validate_rule = [
           'msg' => 'required',
       ];
       $this -> validate($request, $validate_rule);
       $msg = $request->msg;
       $response = response() -> view('hello.index',
       ['msg' => '['.$msg.']をクッキーに保存しました。']);
       $response -> cookie('msg', $msg, 100);
       return $response;
    }

    public function post(HelloRequest $request){
        return view('hello.index', ['msg' => '正しく入力されました']);
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
