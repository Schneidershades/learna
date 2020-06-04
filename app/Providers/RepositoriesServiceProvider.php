<?php

namespace App\Providers;

use App\Repositories\Interfaces\ArtisanProfileRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\CurrencyRepositoryInterface;
use App\Repositories\Interfaces\EmployerProfileRepositoryInterface;
use App\Repositories\Interfaces\ImageUploadRepositoryInterface;
use App\Repositories\Interfaces\PhoneVerificationRepositoryInterface;
use App\Repositories\Interfaces\SkillSetRepositoryInterface;
use App\Repositories\Interfaces\StateRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\UserWalletRepositoryInterface;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\JobRepositoryInterface;
use App\Repositories\JobRepository;
use App\Repositories\ArtisanProfileRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;
use App\Repositories\CurrencyRepository;
use App\Repositories\EmployerProfileRepository;
use App\Repositories\ImageUploadRepository;
use App\Repositories\PhoneVerificationRepository;
use App\Repositories\SkillSetRepository;
use App\Repositories\StateRepository;
use App\Repositories\UserRepository;
use App\Repositories\UserWalletRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
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
        $this->app->bind(ArtisanProfileRepositoryInterface::class, ArtisanProfileRepository::class);
        $this->app->bind(EmployerProfileRepositoryInterface::class, EmployerProfileRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(StateRepositoryInterface::class, StateRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(PhoneVerificationRepositoryInterface::class, PhoneVerificationRepository::class);
        $this->app->bind(EmployerProfileRepositoryInterface::class, EmployerProfileRepository::class);
        $this->app->bind(ImageUploadRepositoryInterface::class, ImageUploadRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(SkillSetRepositoryInterface::class, SkillSetRepository::class);
        $this->app->bind(UserWalletRepositoryInterface::class, UserWalletRepository::class);
        $this->app->bind(JobRepositoryInterface::class, JobRepository::class);
    }
}
