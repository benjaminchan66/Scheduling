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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ========================================================================
Route::get('testUserID', 'TestController@getUserID');

Route::get('testDate', 'TestController@getDateForm');

Route::post('testDate', 'TestController@getDateValue');

Route::get('testDoctorList', 'TestController@getDoctorList');

Route::get('testShowAtWorkDoctorList', 'TestController@showAtWorkDoctorList');

Route::post('resign', 'TestController@resign');

// 取得單一醫師班數的醫生ID傳遞 從醫師列表傳送
Route::get('getDoctorShifts/{id}', 'TestController@getShiftForDoctor');

Route::post('getDoctorShifts/updateShifts', 'TestController@updateDoctorShifts');


// push mail-sending work on the queue
Route::get('shiftExchangeMail', 'MailController@shiftExchange');

Route::get('applyShiftExchangeMail', 'MailController@applyShiftExchanging');

Route::get('exchangingSuccessMail', 'MailController@agreeShiftExchanging');

Route::get('exchangingFailedMail', 'MailController@rejectShiftExchanging');

// ========================================================================