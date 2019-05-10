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

Route::get('surveys/{id}', 'SurveyController@survey')->middleware('auth');

Route::get('chooseonesurvey', 'SurveyController@choosesurvey')->middleware('auth');

Route::get('survey_finished', function () {
    return view('survey_finished');
})->middleware('auth');

Route::get('chapter/{id}/section/{section_rank}', 'ChapterController@chapter')->middleware('auth');

Route::get('casestudy/{id}/step/{step_id}', 'CaseStudyController@chapter')->middleware('auth');

Route::post('/casestudyanswer_edit', 'CaseStudyController@useransweredit');

Route::post('/sectionanswer_edit', 'ChapterController@answeredit');

Route::post('/dataanalysissubmit', 'ChoosequestionController@submit');

Route::group(['middleware' => 'auth:admin'], function () {

    Route::post('/list_chapter', 'ListChapterController@listchapter');

    Route::post('/material_add', 'ListChapterController@materialadd');

    Route::post('/material_edit', 'ListChapterController@materialedit');

    Route::get('/showResult','ShowResultController@index');

    Route::post('/showResult/by_user','ShowResultController@show_by_user');

    Route::get('/showResult/by_user/{user_id}', 'ShowResultController@show_by_ID');
    #Route::get('/showResult/perUser','ShowResultController@user');

    #Route::get('showResult/{id}', 'ShowResultController@showID');

    #Route::get('/dataanalysis','ChoosequestionController@list');

    #Route::get('/dataanalysis/survey/{id}','ChoosequestionController@survey');

    #Route::get('/dataanalysis/casestudy/{id}','ChoosequestionController@casestudy');

    #Route::get('/dataanalysis/sectionstudy/{id}','ChoosequestionController@section');

    #Route::get('/dataanalysis/result/{type}/{id}','ChoosequestionController@result');





//route for the new admin page
    Route::get('showstudymaterial', 'ShowStudyMaterialController@show');

    Route::get('showsurvey', 'ShowStudyMaterialController@showsurvey');

    Route::get('check/chapter/{id}', 'ShowSectionContentController@show');

    Route::get('check/survey/{id}', 'ShowStudyMaterialController@checksurveyquestions');

    Route::get('modify/chapter/{id}/section/{section_id}', 'ModifyMaterialController@showsection');

    Route::get('modify/chapter/{id}', 'ModifyMaterialController@showchapter');

    Route::get('/modify/survey/{survey_id}', 'ShowStudyMaterialController@checksurveytitle');

    Route::get('addnewsection/chapter/{id}', 'ModifyMaterialController@addsection');

    Route::get('addnewsection_que/chapter/{id}', 'ModifyMaterialController@addsectionquestion');

    Route::get('addnewsurvey', 'ModifyMaterialController@addnewsurvey');

    Route::get('/addnewsurveyquestinos/{id}', 'ModifyMaterialController@addsurveyquestion');

    Route::post('/chaptertitle_edit', 'ModifyMaterialController@chaptertitleedit');

    Route::post('/sectiondetail_edit', 'ModifyMaterialController@sectiondetailedit');

    Route::post('/surveydetail_edit', 'ModifyMaterialController@surveydetailedit');

    Route::post('/sectionquestion_edit', 'ModifyMaterialController@sectionquestionedit');

    Route::post('/sectiondetail_add', 'ModifyMaterialController@sectiondetailadd');

    Route::post('/sectionquestion_add', 'ModifyMaterialController@sectionquestionadd');

    Route::post('/survey_add', 'ModifyMaterialController@surveyadd');

    Route::post('/surveyquestion_add', 'ModifyMaterialController@surveyquestionadd');

    Route::post('/chapter_add', 'ModifyMaterialController@chapteradd');

    Route::get('delete/chapter/{id}', 'ShowStudyMaterialController@destroychapter');

    Route::get('/delete/section/{chapter_id}/{section_id}/question/{question_id}', 'ShowStudyMaterialController@destroysecquestion');

    Route::get('delete/case/{id}', 'ShowStudyMaterialController@destroycase');

    Route::get('/delete/survey/{survey_id}', 'ShowStudyMaterialController@destroysurvey');

    Route::get('/delete/surveyquestion/{id}/{question_id}', 'ShowStudyMaterialController@destroysurveyquestions');

    Route::get('/modify/case/{id}', 'ModifyMaterialController@showcase');

    Route::get('/modify/section/{id}/{section_id}/question/{question_id}', 'ModifyMaterialController@showsectionquestion');

    Route::get('/addnewcase/{id}', 'ModifyMaterialController@addnewcase');//

    Route::post('/casedetail_edit', 'ModifyMaterialController@casedetailedit');

    Route::post('/casedetail_add', 'ModifyMaterialController@casedetailadd');//

    Route::get('delete/chapter/{id}/section/{section_counter}', 'ShowSectionContentController@destroy');

    Route::get('/users', 'ShowUser@getusers');

    Route::get('/user/detail/{id}', 'ShowUser@userdetail');

    Route::get('/user/delete/{id}', 'ShowUser@deleteuser');
});
//route for the register



Route::group(['prefix' => 'register'], function () {
    Route::get('agreement', 'RegisterInfoController@agreement');


    Route::get('info1/{id}','RegisterInfoController@nationality');

    Route::get('info2/{id}','RegisterInfoController@language');

    Route::get('info3/{id}','RegisterInfoController@education');

    Route::get('info3_non/{id}','RegisterInfoController@education2');

    Route::get('info4/{id}', function ($id) {
        return view('register_info4')->with("id",$id);
    });
});

Route::post('/info1_get','RegisterInfoController@addinfo1');

Route::post('/info2_get','RegisterInfoController@addinfo2');

Route::post('/info3_get','RegisterInfoController@addinfo3');

Route::post('/info3_nonstu_get','RegisterInfoController@addinfo3_non');

Route::post('/info4_get','RegisterInfoController@addinfo4');

Route::post('/get_agreement','RegisterInfoController@addagreement');

Route::post('/surveyanswer_input','SurveyController@surveyanswer_edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('mylogin', 'Auth\LoginController@mylogin')->name('mylogin');
//Route::get('/link/start','SocketconnectController@connect');
