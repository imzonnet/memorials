<?php namespace App\Services\Validation;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any necessary services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->validator->resolver( function( $translator, $data, $rules, $messages = array(), $customAttributes = array() ) {
            return new ValidatorExtended( $translator, $data, $rules, $messages, $customAttributes );
        } );
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}