<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		\Form::component('bsText', 'components.form.text', ['label','name', 'value', 'attributes']);
		\Form::component('bsTextArea', 'components.form.textarea', ['label','name', 'value', 'attributes']);
		\Form::component('bsSelect', 'components.form.select', ['label','name', 'listValue','value', 'attributes']);
		\Form::component('bsFile', 'components.form.file', ['label','name']);
		\Form::component('bsSubmit', 'components.form.submit', ['label']);
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
