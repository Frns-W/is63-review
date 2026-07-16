<?php
// app/Providers/AppServiceProvider.php
 
namespace App\Providers;
 
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Pagination\Paginator;

=======
 
>>>>>>> 93f3c832ecf478fe90b79c99a5ff6e32cb71a03d
class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
<<<<<<< HEAD
=======
        // Gunakan template pagination Bootstrap 4
>>>>>>> 93f3c832ecf478fe90b79c99a5ff6e32cb71a03d
        Paginator::useBootstrapFour();
    }
}