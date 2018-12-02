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
    return view('Homepage');
});

Route::get('homepage', function () {
    return view('Homepage');
});

Route::get('SurveyFinished', function () {
    return view('SurveyFinished');
});

//Route::get('admin', function () {
//    return view('administer_main');
//});
//
//Route::get('admin/data', function () {
//    return view('administer_data_show');
//});
//
//Route::get('admin/material', function () {
//    return view('administer_material_section');
//});
//
//Route::get('admin/material/add', function () {
//    return view('administer_material_add');
//});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\IndexController@admin_index');
    Route::get('login', 'Admin\LoginController@showLoginForm');
    Route::post('login', 'Admin\LoginController@login');
    Route::post('logout', 'Admin\LoginController@logout');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/data', function () {
            return view('administer_data_show');
        });

        Route::get('/material', function () {
            return view('administer_material_section');
        });

        Route::get('/material/add', function () {
            return view('administer_material_add');
        });
    });

});

Route::get('chapter/{id}/section/{section_rank}', 'ChapterController@chapter')->middleware('auth');

Route::post('/list_chapter', 'ListChapterController@listchapter');

Route::get('surveys/{id}','SurveyController@survey');

Route::post('/material_add', 'ListChapterController@materialadd');

Route::post('/material_edit', 'ListChapterController@materialedit');


//route for the register



Route::group(['prefix' => 'admin'], function () {
    Route::get('agreement', function () {
        return view('register_agreement');
    });

    Route::get('info1','RegisterInfoController@nationality');

    Route::get('info2','RegisterInfoController@language');

    Route::get('info3','RegisterInfoController@education');

    Route::get('info4', function () {
        return view('register_info4');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::post('mylogin', 'Auth\LoginController@mylogin')->name('mylogin');
