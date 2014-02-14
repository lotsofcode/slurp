<?php

Route::group(Config::get('slurp::routing'), function() {
	Route::get('{path}', Config::get('slurp::controller_action'))->where('path', '.*');
});
