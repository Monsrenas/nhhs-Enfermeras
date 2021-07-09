 
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
        
//Route::get('/','SignatureController@index');
//Route::post('/signature','SignatureController@upload')->name('/signature');

Route::get('seccionCliente/{email?}', 'MaterialController@seccionCliente');
Route::get('training_list','MaterialController@training_list')->name('training_list');

/*Route::get('application/{ini}/{fin}/{vis}/','MaterialController@application')->name('application'); */
Route::get('requirements', function () {
		    return view('application.requiremens_Doc');
		});

Route::get('forms/{ini}/{fin}/{vis}/','MaterialController@forms')->name('forms');

Route::get('PDF/{doc}/{vista}','MaterialController@PDF')->name('PDF');

Route::get('createPDF','MaterialController@createPDF')->name('createPDF');


Route::get('exam','MaterialController@Exam')->name('exam');

Route::get('signature','MaterialController@upload')->name('signature');

Route::post('Guardar','MaterialController@Guardar')->name('Guardar');
Route::get('EnviarExamen','MaterialController@createExamPDF')->name('createExamPDF');

Route::post('guardaFirma','MaterialController@guardaFirma')->name('guardaFirma');

Route::post('CorreoContacto','MaterialController@CorreoContacto')->name('CorreoContacto');


Route::get('/Vista','MaterialController@Vista');
Route::get('/ModalView','MaterialController@ModalView');

Route::group(['middleware' => ['web']], function () {
		Route::get('/', function () {
		    return view('home');
		});

		Route::get('/contactus', function () {
		    return view('contact');
		});

		

		Route::get('lang/{lang}', function ($lang) {
						        session(['lang' => $lang]);
						        return \Redirect::back();
						    })->where(['lang' => 'en|es']);

		Route::get('AddJob','MaterialController@AddJob')->name('AddJob');

});

