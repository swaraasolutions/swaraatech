<?php
/**
 * Created by PhpStorm.
 * User: varun
 * Date: 17-02-2018
 * Time: 12:33
 */

//Route::get( 'setupspaces', 'SwaraaTech\Controllers\SetupController@index' );
//Route::get( 'setupspaces', function () {
////	dd(app()->getLoadedProviders());
//	dd( \Illuminate\Support\Facades\Auth::user() );
//} )->web( "web" );
Route::middleware( 'web' )->group( function () {
	Route::get( 'setupspaces', 'SwaraaTech\Controllers\SetupController@index' );
//	Route::post( 'setupspaces', 'SwaraaTech\Controllers\SetupController@index' )->name("setup.post");
	if ( env( "SM_MANAGE_404" ) ) {
		Route::get( env( "SM_HTTP_PATH" ) . '/{slug}', 'SwaraaTech\Controllers\SetupController@imageloader' )->where( 'slug', '^([a-zA-Z].*|[1-9].*)\.*$' );
	}
	else{
		echo "Route Not added";
	}
} );