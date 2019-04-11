<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'server'],function (){
    Route::any('/','UserController@login')->name('login');
//    Route::any('addValidate','UserController@addValidate')->name('addValidate');
    Route::any('login','UserController@login')->name('login');

    Route::any('viewCustomer/delete/{id}','CustomerController@destroy');
    Route::get('viewCustomer/{id}/viewCustomerDetails','CustomerController@viewCustomerDetails')->name('viewCustomerDetails');
    Route::get('viewCustomer/{id}/editCustomer','CustomerController@editCustomer')->name('editCustomer');
    Route::post('viewCustomer/{id}/editCustomer','CustomerController@updateCustomer');

    Route::get('admin/{id}/RoomStatus','RoomController@RoomStatus')->name('RoomStatus');

    Route::post('admin/{id}/RoomStatus','RoomController@updateRoom');
    Route::post('admin/{id}/updateRoomCheck','RoomController@updateRoomCheck');
    Route::post('admin/{room_id}/updateRoomSts','RoomController@updateRoomSts');
    Route::any('roomCheck/delete/{id}','RoomController@destroyCheck');

    Route::any('roomView/delete/{id}','RoomController@destroy');
    Route::get('roomView/{id}/editRoom','RoomController@editRoom')->name('editRoom');
    Route::post('roomView/{id}/editRoom','RoomController@updateRoomNumber');

    Route::get('roomViewRoomType/{id}/editRoomType','RoomController@editRoomType')->name('editRoomType');
    Route::post('roomViewRoomType/{id}/editRoomType','RoomController@updateRoomType');
    Route::any('roomViewRoomType/delete/{id}','RoomController@destroyType');

    Route::get('roomViewRoomFloor/{id}/editRoomFloor','RoomController@editRoomFloor')->name('editRoomFloor');
    Route::post('roomViewRoomFloor/{id}/editRoomFloor','RoomController@updateRoomFloor');
    Route::any('roomViewRoomFloor/delete/{id}','RoomController@destroyFloor');

    Route::get('roomCheck/{id}/editBill','RoomController@editBill')->name('editBill');
    Route::post('roomCheck/{id}/updateBill','RoomController@updateBill');


    Route::any('roomBook/delete/{room_id}','RoomController@destroyBook');
    Route::any('roomBook/deleteItm/{id}','RoomController@destroyBookItm');


    Route::get('addUser/{id}/editUser','UserController@editUser')->name('editUser');
    Route::post('addUser/{id}/editUser','UserController@updateUser');
    Route::get('addUser/delete/{id}','UserController@destroy');
    Route::post('addUser/{id}/updateUserStatus','UserController@updateUserStatus');
    Route::post('addUser/{id}/updateUserSts','UserController@updateUserSts');

    Route::get('addValidation/{id}/editValidation','RameshController@editValidation')->name('editValidation');
    Route::post('addValidation/{id}/editValidation','RameshController@updateValidation');
    Route::get('addValidation/delete/{id}','RameshController@destroy');

});


Route::group(['namespace'=>'server','prefix'=>'admin','middleware'=>'auth'],function (){
    Route::get('{id}/guest_id',function (){
        $value = Illuminate\Support\Facades\Input::get('identy');
        $guest_name = \App\Customer::where('id', '=', $value)->get();
        return Response::json($guest_name);
    });
    Route::get('{id}/guest_name',function (){
        $value = Illuminate\Support\Facades\Input::get('identy');
        $guest_id = \App\Customer::where('id', '=', $value)->get();
        return Response::json($guest_id);
    });

    Route::get('country_name',function (){
        $country_id = Illuminate\Support\Facades\Input::get('country_id');
        $zone_name = \App\Zone::where('country_id', '=', $country_id)->get();
        return Response::json($zone_name);
    });
    Route::get('nationality',function (){
        $nationality = Illuminate\Support\Facades\Input::get('nationality');
        $country_name = \App\Country::where('nationality', '=', $nationality)->get();
        return Response::json($country_name);
    });
    Route::get('zone_name',function (){
        $zone_id = Illuminate\Support\Facades\Input::get('zone_id');
        $district_name = \App\District::where('zone_id', '=', $zone_id)->get();
        return Response::json($district_name);
    });
    Route::get('district_name',function (){
        $district_id = Illuminate\Support\Facades\Input::get('district_id');
        $vdc_name = \App\Location::where('district_id', '=', $district_id)->get();
        return Response::json($vdc_name);
    });

    Route::any('/','DashboardController@index')->name('admin');
    Route::any('addCustomer','CustomerController@addCustomer')->name('addCustomer');
    Route::any('viewCustomer','CustomerController@viewCustomer')->name('viewCustomer');

    Route::get('FindZone','CustomerController@FindZone')->name('FindZone');
    Route::group(['prefix'=>'users','middleware'=>'status'],function (){
    });
    Route::any('logout','UserController@logout')->name('logout');
    Route::post('addRoom','RoomController@addRoom')->name('addRoom');
    Route::post('addRoomType','RoomController@addRoomType')->name('addRoomType');
    Route::post('addRoomFloor','RoomController@addRoomFloor')->name('addRoomFloor');

    Route::any('roomView','RoomController@roomView')->name('roomView');

    Route::any('roomBook','RoomController@roomBook')->name('roomBook');
    Route::any('roomCheck','RoomController@roomCheck')->name('roomCheck');

    Route::any('addUser','UserController@addUser')->name('addUser');
    Route::any('updateUser','UserController@updateUser')->name('updateUser');
    Route::any('password','UserController@getPassword')->name('password');;
    Route::post('password','UserController@postPassword');
    Route::group(['prefix'=>'Report-Analysis-Section','middleware'=>'auth'],function (){
        Route::any('Report','ReportController@Report')->name('Report');
        Route::any('districtGuest','ReportController@districtGuest')->name('districtGuest');
        Route::any('districtWiseGuest','ReportController@districtWiseGuest')->name('districtWiseGuest');

    });
});
Route::group(['namespace'=>'server','prefix'=>'ramesh','middleware'=>'auth'],function (){
    Route::any('addValidation','RameshController@addValidation')->name('addValidation');

});


