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

Route::get('homepageguest', function () {
    return view('HomepageGuest');
});

Route::get('Login', function () {
    return view('Login');
});

Route::get('SurveyFinished', function () {
    return view('SurveyFinished');
});

Route::get('admin', function () {
    return view('administer_main');
});

Route::get('admin/data', function () {
    return view('administer_data_show');
});

Route::get('admin/material', function () {
    return view('administer_material_section');
});

Route::get('admin/material/add', function () {
    return view('administer_material_add');
});

Route::get('casestudy/{id}/step/{step_id}', 'CaseStudyController@chapter');

Route::get('chapter/{id}/section/{section_rank}', 'ChapterController@chapter');

Route::post('/list_chapter', 'ListChapterController@listchapter');

Route::get('surveys/{id}','SurveyController@survey');

Route::post('/material_add', 'ListChapterController@materialadd');

Route::post('/material_edit', 'ListChapterController@materialedit');

Route::post('/casestudyanswer_edit', 'CaseStudyController@useransweredit');

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
