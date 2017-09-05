<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('react',function (){

        return 'no data';

});
Route::post('react',function (Request $request){
    if ($request){
        $file = $request->file('photo');
        //Move Uploaded File
        $destinationPath = 'uploads';
        $name = date('d_m_Y_M_s') . '.'.$file->getClientOriginalName();
        $file->move($destinationPath,$name);
        return $request->all();
    }else{
        return 'no data';
    }
});

Route::get('photos',function (){
    $photos = [];
    $files1 = scandir(public_path('uploads'),1);
    $i=0;
    foreach ($files1 as $file){
        if (strpos($file,'jpg')){
            $photos[$i]=$file;
            $i++;
        }
    }
    return $photos;
});
