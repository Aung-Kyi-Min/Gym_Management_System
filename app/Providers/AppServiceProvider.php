<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // Dao Registration
        $this->app->bind('App\Contracts\Dao\UserDaoInterface', 'App\Dao\UserDao');
        $this->app->bind('App\Contracts\Dao\Admin\AdminDaoInterface', 'App\Dao\Admin\AdminDao');
        $this->app->bind('App\Contracts\Dao\Admin\WorkoutDaoInterface', 'App\Dao\Admin\WorkoutDao');
        $this->app->bind('App\Contracts\Dao\Admin\InstructorDaoInterface', 'App\Dao\Admin\InstructorDao');
        $this->app->bind('App\Contracts\Dao\Admin\UserDaoInterface', 'App\Dao\Admin\UserDao');
        $this->app->bind('App\Contracts\Dao\Admin\MemberDaoInterface', 'App\Dao\Admin\MemberDao');
        $this->app->bind('App\Contracts\Dao\Admin\DiscountDaoInterface', 'App\Dao\Admin\DiscountDao');
        $this->app->bind('App\Contracts\Dao\AuthDaoInterface', 'App\Dao\AuthDao');
        $this->app->bind('App\Contracts\Dao\PaymentDaoInterface', 'App\Dao\PaymentDao');
        $this->app->bind('App\Contracts\Dao\MemberDaoInterface', 'App\Dao\MemberDao');
        $this->app->bind('App\Contracts\Dao\WorkoutDaoInterface', 'App\Dao\WorkoutDao');
        $this->app->bind('App\Contracts\Dao\BmiDaoInterface', 'App\Dao\BmiDao');



        // Business logic registration
        $this->app->bind('App\Contracts\Services\UserServiceInterface', 'App\Services\UserService');
        $this->app->bind('App\Contracts\Services\Admin\AdminServiceInterface', 'App\Services\Admin\AdminService');
        $this->app->bind('App\Contracts\Services\Admin\WorkoutServiceInterface', 'App\Services\Admin\WorkoutService');
        $this->app->bind('App\Contracts\Services\Admin\InstructorServiceInterface', 'App\Services\Admin\InstructorService');
        $this->app->bind('App\Contracts\Services\Admin\UserServiceInterface', 'App\Services\Admin\UserService');
        $this->app->bind('App\Contracts\Services\Admin\MemberServiceInterface', 'App\Services\Admin\MemberService');
        $this->app->bind('App\Contracts\Services\Admin\DiscountServiceInterface', 'App\Services\Admin\DiscountService');
        $this->app->bind('App\Contracts\Services\AuthServiceInterface', 'App\Services\AuthService');
        $this->app->bind('App\Contracts\Services\PaymentServiceInterface', 'App\Services\PaymentService');
        $this->app->bind('App\Contracts\Services\MemberServiceInterface', 'App\Services\MemberService');
        $this->app->bind('App\Contracts\Services\WorkoutServiceInterface', 'App\Services\WorkoutService');
        $this->app->bind('App\Contracts\Services\BmiServiceInterface', 'App\Services\BmiService');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
