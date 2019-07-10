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

use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Route::post('/upload_image', function() {
    echo 'start';
    $CKEditor = Input::get('CKEditor');
   $funcNum = Input::get('CKEditorFuncNum');
    $message = $url = '';
    if (Input::hasFile('upload')) {
        $file = Input::file('upload');
        if ($file->isValid()) {
            $filename = $file->getClientOriginalName();
            $file->move(storage_path().'/app/public/images/', $filename);
            $url = public_path() .'/storage/images/' . $filename;
        } else {
            $message = 'An error occured while uploading the file.';
        }
    } else {
        $message = 'No file uploaded.';
    }
   return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';

});*/
Route::post('upload_image','CkeditorController@uploadImage')->name('upload');