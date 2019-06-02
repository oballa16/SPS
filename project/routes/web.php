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
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
})->name('services');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/team', function () {
    return view('team');
})->name('team');
Route::get('/news', function () {
    return view('news');
})->name('news');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Citizen Routes
 */

Route::get('/services/tickets', 'ServicesController@indexTickets')->name('checkTickets');
Route::get('/services/wanted-people', 'ServicesController@indexPeople')->name('listWantedPeople');
Route::get('/services/complaint', 'ServicesController@indexComplaint')->name('fileComplaint');
Route::post('services/complaint', 'ServicesController@store')->name('complain');
Route::get('/services/patrols', 'ServicesController@indexPatrols')->name('searchPatrols');
Route::get('/services/tickets', 'ServicesController@indexTickets')->name('checkTickets');
Route::post('services/tickets', 'ServicesController@showTickets')->name('tickets');


/*
 * Routes for all users
 */

Route::group(['middleware' => 'auth'], function () {

    /*
     * Change Password
     */
    Route::get('/changepass/{id}', 'UserController@showPass')->name('showPassReset');
    Route::patch('/changepass', 'UserController@changePass')->name('changePass');

    /*
     * Citizen Lookup
     */
    Route::get('/citizens', 'CitizensController@index')->name('citizenLookup');
    Route::post('citizens', 'CitizensController@index2')->name('citizenSearch');
    Route::get('/citizens/{id}', 'CitizensController@show')->name('openProfile');


});

/*Regular Police Employee Routes*/
Route::group(['middleware' => 'auth', 'employee'], function () {

    Route::get('/employee/tickets', 'ServicesController@addTickets')->name('addTickets');
    Route::post('employee', 'ServicesController@storeTickets')->name('storeNewTicket');
    Route::get('/employee/tasks', 'TasksController@indexTasks')->name('tasks');
    Route::patch('/employee/tasks/{id}', 'TasksController@completeTask')->name('completeTask');
    Route::get('/employee/tasks/{id}/file-report', 'TasksController@showFileUpload')->name('showFileUpload');
    Route::post('employee/tasks/{id}/file-report', 'TasksController@uploadFileReport')->name('uploadFileReport');
    Route::get('/files/{fileid}', 'TasksController@showFile')->name('showFile');
    Route::delete('/employee/tasks/{id}/files/{fileid}', 'TasksController@deleteFile')->name('deleteFile');


    /*
     * Complaints
     */
    Route::get('complaints/{id}', 'ComplaintsController@show')->name('complaint');
    Route::get('/complaints', 'ComplaintsController@index')->name('viewComplaints');
    Route::patch('complaints/{id}', 'ComplaintsController@update')->name('closeComplaint');
    Route::post('/complaints/handle/{id}', 'ComplaintsController@handle')->name('handleComplaint');
    Route::post('complaints/report/{id}', 'ComplaintsController@report')->name('reportComplaint');
});

Route::group(['middleware' => 'auth', 'officer'], function () {

    Route::get('/cases/{id}', 'CasesController@index')->name('viewCases'); //id = officer id
    Route::get('/cases/{id}/file-upload', 'CasesController@showCaseFileUpload')->name('showCaseFileUpload'); // id = case id
    Route::post('/cases/{id}/file-upload', 'CasesController@uploadCaseFile')->name('uploadCaseFile'); // id == case id
    Route::delete('/cases/{id}/file-upload/{fileid}', 'CasesController@deleteCaseFile')->name('deleteCaseFile'); // id -> case-id
    Route::get('cases/{id}/people', 'CasesController@showPeopleForm')->name('showPeopleForm'); // id == case->id
    Route::get('cases/{id}/edit', 'CasesController@showEditForm')->name('editCase');


    Route::get('/cases/{id}/tasks', 'CasesController@showTask')->name('showTask'); // id == officer-id
    Route::post('/cases/{id}/tasks', 'CasesController@addTask')->name('addTask'); // id == officer - id
    Route::get('/cases/{id}/{caseid}', 'CasesController@show')->name('openCase'); // id= officer-id
    Route::get('/cases/{id}/{caseid}/download', 'CasesController@zipFiles')->name("zipFile"); // id == officer id


    Route::get('/archive', 'CasesController@openArchive')->name('archive');
    Route::get('/archive/search', 'CasesController@searchArchive')->name('searchArchive');

});


