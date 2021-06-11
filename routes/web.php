<?php 


Route::get("fedex", "EXACTSports\FedEx\Http\Controllers\FedexController@index");
Route::get("fedex/oauth/token", "EXACTSports\FedEx\Http\Controllers\FedexController@getToken");
