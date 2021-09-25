<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // // クロージャでコンポーザ処理を追加
        // View::composer(
        //     'hello.index', function($view){
        //         $view->with('view_message', 'MONSTA X = 筋肉美');
        //     }
        // );

        // 定義したビューコンポーザのクラスを利用
        View::composer(
            'hello.index', 'App\Http\Composers\HelloComposer'
        );
    }    
}
