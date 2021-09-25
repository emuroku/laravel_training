<?php
// 名前空間
namespace App\Http\Composers;

use Illuminate\View\View;

class HelloComposer
{
    public function compose(View $view) //viewインスタンスにあるメソッドを利用してビューを操作する
    {
        $view->with('view_message', 'これは"' . $view->getName() . '"です。');
    }
}