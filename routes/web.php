<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Auth::routes(['verify' => true]);

Route::get('/home', function (){
    if (auth()->user()->hasRole('client')){
         return redirect(route('client.home.index'));
    }
    elseif (auth()->user()->hasRole('tenant')){
        $this->redirectTo = route('tenant.home.index');
        return redirect($this->redirectTo);
    }
    elseif (auth()->user()->hasRole('senior-property-manager')){
        $this->redirectTo = route('spm.home.index');
        return redirect($this->redirectTo);
    }
    elseif (auth()->user()->hasRole('property-manager')){
        $this->redirectTo = route('pm.home.index');
        return redirect($this->redirectTo);
    }
    elseif (auth()->user()->hasRole('facility-manager')){
        $this->redirectTo = route('fm.home.index');
        return redirect($this->redirectTo);
    }
    elseif (auth()->user()->hasRole('ceo')){
        $this->redirectTo = route('ceo.home.index');
        return redirect($this->redirectTo);
    }
    elseif (auth()->user()->hasRole('superadmin')){
        $this->redirectTo = route('superadmin.home.index');
        return redirect($this->redirectTo);
    }
    else{
        return redirect('404');
    }
})->middleware('verified')->name('home');


//Public
Route::get('complaint', [App\Http\Controllers\ComplaintController::class, 'index'])->name('complaint');
Route::post('complaint/submit', [App\Http\Controllers\ComplaintController::class, 'store'])->name('complaint.store');
Route::post('complaint/comment/submit', [App\Http\Controllers\ComplaintController::class, 'comment_store'])->name('complaint.comment.store');
Route::get('complaint/{complaint}', [App\Http\Controllers\ComplaintController::class, 'show'])->name('complaint.show');
Route::get('request', [App\Http\Controllers\RequestController::class, 'index'])->name('request');
Route::post('request/submit', [App\Http\Controllers\RequestController::class, 'store'])->name('request.store');
Route::post('request/comment/submit', [App\Http\Controllers\RequestController::class, 'comment_store'])->name('request.comment.store');
Route::get('request/{request}', [App\Http\Controllers\RequestController::class, 'show'])->name('request.show');
Route::get('enquiry', [App\Http\Controllers\EnquiryController::class, 'index'])->name('enquiry');
Route::post('enquiry/submit', [App\Http\Controllers\EnquiryController::class, 'store'])->name('enquiry.store');
Route::post('enquiry/comment/submit', [App\Http\Controllers\EnquiryController::class, 'comment_store'])->name('enquiry.comment.store');
Route::get('enquiry/{enquiry}', [App\Http\Controllers\EnquiryController::class, 'show'])->name('enquiry.show');


Route::get('units', [App\Http\Controllers\UnitController::class, 'index'])->name('units');
Route::post('unit/add', [App\Http\Controllers\UnitController::class, 'store'])->name('add.unit');
Route::get('unit/{id}', [App\Http\Controllers\UnitController::class, 'show'])->name('show.unit');
Route::post('unit/update/{id}', [App\Http\Controllers\UnitController::class, 'update'])->name('update.unit');

Route::get('unitscategories', [App\Http\Controllers\UnitcategoryController::class, 'index'])->name('unitcats');
Route::post('unitcat/add', [App\Http\Controllers\UnitcategoryController::class, 'store'])->name('add.unitcat');

//Client
Route::namespace('App\Http\Controllers\Client')->prefix('client')->name('client.')->middleware('can:client','verified')->group(function (){
    Route::get('messages', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('messages/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('messages/store', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('messages/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('messages/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

    Route::resource('user','UsersController');
    Route::resource('home','HomeController');
    Route::resource('faq','FaqController');
    Route::resource('notice','NoticeController');
    Route::resource('kyc','KycController');

    Route::get('fullcalendar', [App\Http\Controllers\Client\FullCalendarController::class, 'index'])->name('fullcalendar');
    Route::post('fullcalendar/create', [App\Http\Controllers\Client\FullCalendarController::class, 'create'])->name('fullcalendar.create');
    Route::post('fullcalendar/update', [App\Http\Controllers\Client\FullCalendarController::class, 'update'])->name('fullcalendar.update');
    Route::post('fullcalendar/delete', [App\Http\Controllers\Client\FullCalendarController::class, 'destroy'])->name('fullcalendar.destroy');


});


//Tenant
Route::namespace('App\Http\Controllers\Tenant')->prefix('tenant')->name('tenant.')->middleware('can:tenant','verified')->group(function (){
    Route::get('messages', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('messages/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('messages/store', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('messages/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('messages/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

    Route::resource('user','UsersController');
    Route::resource('home','HomeController');
    Route::resource('faq','FaqController');
    Route::resource('notice','NoticeController');

    Route::get('fullcalendar', [App\Http\Controllers\Tenant\FullCalendarController::class, 'index'])->name('fullcalendar');
    Route::post('fullcalendar/create', [App\Http\Controllers\Tenant\FullCalendarController::class, 'create'])->name('fullcalendar.create');
    Route::post('fullcalendar/update', [App\Http\Controllers\Tenant\FullCalendarController::class, 'update'])->name('fullcalendar.update');
    Route::post('fullcalendar/delete', [App\Http\Controllers\Tenant\FullCalendarController::class, 'destroy'])->name('fullcalendar.destroy');
});

//SeniorPM
Route::namespace('App\Http\Controllers\SPM')->prefix('spm')->name('spm.')->middleware('can:senior-property-manager','verified')->group(function (){
    Route::get('messages', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('messages/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('messages/store', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('messages/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('messages/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

    Route::resource('user','UsersController');
    Route::resource('tenant','TenantController');
    Route::resource('client','ClientController');
    Route::resource('home','HomeController');
    Route::resource('faq','FaqController');
    Route::resource('notice','NoticeController');
    Route::resource('service','ServiceController');
    Route::resource('facility','FacilityController');
    Route::resource('property','PropertyController');

    Route::get('fullcalendar', [App\Http\Controllers\SPM\FullCalendarController::class, 'index'])->name('fullcalendar');
    Route::post('fullcalendar/create', [App\Http\Controllers\SPM\FullCalendarController::class, 'create'])->name('fullcalendar.create');
    Route::post('fullcalendar/update', [App\Http\Controllers\SPM\FullCalendarController::class, 'update'])->name('fullcalendar.update');
    Route::post('fullcalendar/delete', [App\Http\Controllers\SPM\FullCalendarController::class, 'destroy'])->name('fullcalendar.destroy');
});

//PM
Route::namespace('App\Http\Controllers\PM')->prefix('pm')->name('pm.')->middleware('can:property-manager','verified')->group(function (){
    Route::resource('home','HomeController');
});

//FM
Route::namespace('App\Http\Controllers\FM')->prefix('fm')->name('fm.')->middleware('can:facility-manager','verified')->group(function (){
    Route::get('messages', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('messages/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('messages/store', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('messages/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('messages/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

    Route::resource('user','UsersController');
    Route::resource('tenant','TenantController');
    Route::resource('home','HomeController');
    Route::resource('faq','FaqController');
    Route::resource('notice','NoticeController');
    Route::resource('service','ServiceController');
    Route::resource('facility','FacilityController');
    Route::resource('property','PropertyController');

    Route::get('fullcalendar', [App\Http\Controllers\FM\FullCalendarController::class, 'index'])->name('fullcalendar');
    Route::post('fullcalendar/create', [App\Http\Controllers\FM\FullCalendarController::class, 'create'])->name('fullcalendar.create');
    Route::post('fullcalendar/update', [App\Http\Controllers\FM\FullCalendarController::class, 'update'])->name('fullcalendar.update');
    Route::post('fullcalendar/delete', [App\Http\Controllers\FM\FullCalendarController::class, 'destroy'])->name('fullcalendar.destroy');
});

//Accountant
Route::namespace('App\Http\Controllers\Accountant')->prefix('act')->name('act.')->middleware('can:accountant','verified')->group(function (){
    Route::resource('home','HomeController');
});

//CEO
Route::namespace('App\Http\Controllers\CEO')->prefix('ceo')->name('ceo.')->middleware('can:ceo','verified')->group(function (){
    Route::resource('home','HomeController');
});


//Superadmin
Route::namespace('App\Http\Controllers\Superadmin')->prefix('superadmin')->name('superadmin.')->middleware('can:superadmin','verified')->group(function (){
    Route::resource('home','HomeController');
});
