<?php

use App\Http\Controllers\classRooms;
use App\Http\Controllers\eventCreator;
use App\Http\Controllers\eventController;
use App\Http\Controllers\downloadController;
use App\Http\Controllers\eventUser;
use App\Http\Controllers\inputData;
use App\Http\Controllers\teacherLogin;
use Illuminate\Support\Facades\Route;


/* comments and file upload */

// Route::get('/inputData', [inputData::class, 'index']);
Route::get('/inputData', [inputData::class, 'dataDisplay'])->name('inputData.index');
Route::post('/inputData', [inputData::class, 'upload']);

Route::get('/download/{id}', [downloadController::class, 'download'])->name('download');


/* main page */

Route:: get('/', [teacherLogin::class, 'index'])->name('select');

/* Teacher */
Route:: get('/teacherLogin', [teacherLogin::class, 'login'])->name('teacher.login');
Route::post('/teacherLogin', [teacherLogin::class, 'authenticate']);

Route:: get('/teacherRegister', [teacherLogin::class, 'register'])->name('teacher.register');
Route::post('/teacherRegister', [teacherLogin::class, 'store']);
// GET DISPLAY
Route:: get ('/teacher/{t_id}/classRooms', [classRooms::class, 'show'])->name('teacher.classRooms');

Route::get('/teacher/{t_id}/room/create', [classRooms::class, 'create'])->name('teacher.create');
Route::post('/teacher/{t_id}/room/create', [classRooms::class, 'store'])->name('teacher.store');

// POST CREATE
Route::get('/{id}/event/create', [eventController::class, 'create'])->name('admin.create');
Route::post('/{id}/event/create', [eventController::class, 'store']);
// PUT OR PATCH EDITING
Route::get('/{id}/event/{eid}/edit', [eventController::class, 'edit']);
Route::patch('/{id}/event/{eid}/edit', [eventController::class, 'update']);
// DELETE
Route::delete('/{id}/event/{eid}/delete', [eventController::class, 'destroy']);







Route:: get('/userlogin', [eventUser::class, 'login'])->name('user.login');
Route::post('/userlogin', [eventUser::class, 'authenticate']);
Route:: get('/userregister', [eventUser::class, 'register'])->name('user.register');
Route::post('/userregister', [eventUser::class, 'store']);
// GET DISPLAY
Route:: get ('/{id}/events', [eventUser::class, 'show'])->name('user.event');
//BOOKING
Route:: get ('/{id}/events/{eid}/book', [eventUser::class, 'viewbook'])->name('user.book');
Route:: post ('/{id}/events/{eid}/book', [eventUser::class, 'book']);
//TICKET VIEW
Route:: get ('/{id}/ticket', [eventUser::class, 'viewticket'])->name('user.ticket');
// DELETE TICKETS
Route::delete('/{id}/ticket/delete/{tid}', [eventUser::class, 'destroy1']);