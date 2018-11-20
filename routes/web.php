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

Route::get('homepage', function () {
    return view('Homepage');
});


//route for the admin
Route::get('admin', function () {
    return view('administer_main');
});

Route::get('admin/material', function () {
    return view('administer_material_section');
});

Route::get('admin/material/add', function () {
    return view('administer_material_add');
});

//route for chapter

Route::get('chapter/{id}/section/{section_rank}', 'ChapterController@chapter');

//route for post

Route::post('/list_chapter', 'ListChapterController@listchapter');

Route::post('/material_submit', 'ListChapterController@materialsubmit');


//route for the register

Route::get('register', function () {
    return view('register');
});

Route::get('register/agreement', function () {
    return view('register_agreement');
});

Route::get('register/info1','registerinfo1@nationality');

Route::get('register/info2','registerinfo2@language');

Route::get('register/info3','registerinfo3@education');

Route::get('register/info4', function () {
    return view('register_info4');
});
