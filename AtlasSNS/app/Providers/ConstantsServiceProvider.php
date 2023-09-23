<?php

// app/Providers/ConstantsServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConstantsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Constants', function () {
            return new \App\Constants();
        });
    }
}
