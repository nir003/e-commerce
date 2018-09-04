<?php

namespace App\Providers;

use App\Category;
use App\Manufacture;
use App\Slider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        /*for passing data to partials*/

        view()->composer('partials._footer',function($view){
            $name = "Nirjhor";
            $view->with('name',$name);
        });

        view()->composer('partials._header',function($view){
            $name = "Sazzad Hossain";
            $view->with('name',$name);
        });

        view()->composer('partials._leftSidebar',function($view){

            $categories = Category::all();
            $manufactures  = Manufacture::all();

            $view->with('categories',$categories)->with('manufactures',$manufactures);

        });

        view()->composer('partials._slider',function($view){

            $sliders = Slider::all()->where('publication_status',1);


            $view->with('sliders',$sliders);

        });

        /*for passing data to partials*/
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
