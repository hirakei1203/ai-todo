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
        // リポジトリの依存性注入
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
