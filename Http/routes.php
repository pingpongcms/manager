<?php

backend_routes(function () {
	Route::group(['namespace' => 'Pingpong\Cms\Manager\Http\Controllers'], function () {
        Route::get('modules', [
            'as' => 'admin.modules.index',
            'uses' => 'ModulesController@index'
        ]);
        Route::get('modules/update/{module}/{status}', [
            'as' => 'admin.modules.update',
            'uses' => 'ModulesController@update'
        ]);
        Route::delete('modules/{module}', [
            'as' => 'admin.modules.destroy',
            'uses' => 'ModulesController@destroy'
        ]);
	});
});