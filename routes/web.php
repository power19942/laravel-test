<?php
use Illuminate\Support\Facades\Storage;
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

Route::get('/manyTags',function(){
  $tag = new App\Tag();
  return $tag->find(1)->articles()->get();
});

Route::get('/manyArticles',function(){
  $article = new App\Article();
  return $article->find(1)->tags();
});


Route::get('/event',function(){
	event(new \App\Events\TestEvent('data'));
	\Illuminate\Support\Facades\File::put('./est.txt','shit');
	return ['errors'=>'some shir'];
});