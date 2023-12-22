<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\CheckIn;
// use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $books = Book::all();
        $checkIns = CheckIn::all();

        view()->share('books', $books);
        view()->share('checkIns', $checkIns);

        // View::share('books', $books);

    }
}
