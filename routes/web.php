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


// ===========================showallReservationList==================================
Route::get('/reservation', 'AccountController@reservation');

// ===========================showReservationByresSerial==============================
Route::get('/showReservation', 'AccountController@showReservation');
Route::post('/show','AccountController@getDataByResSerial');

// ==================================showDoctor'sReservation==========================

//Route::post('doctor', 'AccountController@getDoctorID');
Route::get('getReservationByID', 'AccountController@getReservationByID');
//Route::get('getReseverationByPeriodSerial','AccountController@getReseverationByPeriodSerial');

// =============================update================================================
Route::post('updateReservation', 'AccountController@updateReservation');
Route::post('toEdit', 'AccountController@getDataByID');

// ===================================================================================

Route::get('/reservation/delete/{id}', 'AccountController@deleteReservation');

// =============================add================================================
Route::get('/addReservation', function() {
    return view('addReservation');
});
Route::post('/addReservation', 'AccountController@addReservation');
// ===================================================================================



//所有換班紀錄
Route::get('/shiftRecords/', 'ShiftRecordsController@shiftRecords');

//單一醫生換班紀錄
Route::get('/getShiftRecordsByDoctorID', 'ShiftRecordsController@getShiftRecordsByDoctorID');

//新增換班
Route::get('/addShifts', function() {
    return view('addShifts');
});
Route::post('/addShifts', 'ShiftRecordsController@addShifts');

//醫生換班確認
Route::post('/doctorCheckShift', 'ShiftRecordsController@doc2Confirm');
Route::post('/doctorCheck', 'ShiftRecordsController@getDataByID');



//Route::post('reservation/updateReservation/{id}', 'AccountController@updateReservation');
//Route::get('/reservation/updateReservation/{id}', function() {
//	return view('updateReservation');

//});
