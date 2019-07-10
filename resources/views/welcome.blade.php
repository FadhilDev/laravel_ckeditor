@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">CKeditor</div>
                    <textarea id="ckview"></textarea>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
   <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('ckview',{
            filebrowserUploadMethod : 'form',
            filebrowserUploadUrl: '{{ route('upload',['_token' => csrf_token() ]) }}',
        });
    </script>
@endsection