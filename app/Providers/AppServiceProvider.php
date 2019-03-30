<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use packages\Domain\Domain\User\UserRepositoryInterface;
use packages\Infrastructure\User\UserRepository;
use packages\InMemoryInfrastructure\User\InMemoryUserRepository;
use packages\UseCase\User\GetList\UserGetListUseCaseInterface;
use packages\Domain\Application\User\UserGetListInteractor;
use packages\UseCase\User\Create\UserCreateUseCaseInterface;
use packages\Domain\Application\User\UserCreateInteractor;
use packages\MockInteractor\User\MockUserGetListInteractor;
use packages\MockInteractor\User\MockUserCreateInteractor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Databaseを使用する場合はコメントアウト
        $this->registerForInMemory();

        // Mockで実行しない場合はコメントアウト
//        $this->registerForMock();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function registerForInMemory()
    {
//        $this->app->singleton(UserRepositoryInterface::class, InMemoryUserRepository::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserGetListUseCaseInterface::class, UserGetListInteractor::class);
        $this->app->bind(UserCreateUseCaseInterface::class, UserCreateInteractor::class);
    }

    private function registerForMock()
    {
        $this->app->bind(UserGetListUseCaseInterface::class, MockUserGetListInteractor::class);
        $this->app->bind(UserCreateUseCaseInterface::class, MockUserCreateInteractor::class);
    }

}
