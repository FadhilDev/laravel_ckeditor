<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CkeditorController extends Controller
{
    public function uploadImage(Request $request) {
     $CKEditor = $request->get('CKEditor');
        $funcNum  = $request->get('CKEditorFuncNum');
        $message  = $url = '';
        if (Input::hasFile('upload')) {
            $file = Input::file('upload');
            if ($file->isValid()) {
               //$filename =rand(1000,9999).$file->getClientOriginalName();
                $filename= md5($file->getClientOriginalName()).$file->getClientOriginalName();
                $file->move(storage_path().'/app/public/images/', $filename);
                $url = url('/storage/images/' . $filename);
            } else {
                $message = 'An error occurred while uploading the file.';
            }
        } else {
            $message = 'No file uploaded.';
        }
        return "<script>window.parent.CKEDITOR.tools.callFunction($funcNum,'{$url}','{$message}')</script>";

    }
}
