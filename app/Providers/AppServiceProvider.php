<?php

namespace App\Providers;

use App\Models\Task;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Dedoc\Scramble\Scramble;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //3
        Scramble::routes(function (Route $route) {
            return Str::startsWith($route->uri, 'api/');
        });
        /*  Task::macro("concatData", function () {
            return "I am OK";
        }); */
        Str::macro('toUpperCase', function ($part) {
            return strtoupper($part);
        });
        Http::macro('local', function () {
            return Http::baseUrl('https://xxxxxxx.ma');
        });
    }
}
