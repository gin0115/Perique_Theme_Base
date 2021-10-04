<?php

declare(strict_types=1);

use ##SCOPER_PREFIX##\PinkCrab\Perique\Application\App_Factory;

require_once __DIR__ . '/function_pollyfills.php';
require_once __DIR__ . '/build/vendor/autoload.php';

( new App_Factory() )->with_wp_dice( true )
	->di_rules( require __DIR__ . '/config/dependencies.php' )
	->app_config( require __DIR__ . '/config/settings.php' )
	->registration_classes( require __DIR__ . '/config/registration.php' )
	->boot();
