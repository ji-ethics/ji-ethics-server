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

Route::get('admin', function () {
    return view('administer_main');
});

Route::get('admin/material', function () {
    return view('administer_material_section');
});


Route::get('chapter/{id}/section/{section_rank}', 'ChapterController@chapter');

Route::post('/list_chapter', 'ListChapterController@listchapter');

Route::get('surveys/{id}','SurveyController@survey');
