<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Task\TaskRepositoryInterface;
use App\Infrastructure\Repositories\TaskRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register repositoryInterfaces
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
