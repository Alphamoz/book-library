<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // gate for admin access
        Gate::define('admin', function(Book $book, User $user) {
            return $user->is_admin == true;
        });

        // gate for updating for not admin, not used in this implementation
        Gate::define('update-not-admin', function(Book $book, User $user){
            return $user->id == $book->user_id;
        });
    }
}
