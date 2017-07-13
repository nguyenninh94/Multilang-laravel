<?php

namespace App\Repositories\User;

use Illuminate\Support\ServiceProvider;

class UserRepoServiceProvider extends ServiceProvider
{
	public function boot()
	{
		//
	}

	public function register()
	{
		$this->app->bind('App\Repositories\User\UserRepositoryInterface', 'App\Repositories\User\UserEloquentRepository');
	}
}