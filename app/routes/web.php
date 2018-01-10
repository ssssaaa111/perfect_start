<?php

//use Illuminate\Support\Facades\Redis;
//use App\Events\UserHasRegistered;

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

Route::get('article/trending', function () {
    $trending = Redis::zrevrange('trending_article', 0, 2);
    $trending = \App\Article::hydrate(
        array_map('json_decode', $trending)
    );

    dd( $trending) ;

});

Route::get('article/{article}', function (App\Article $article) {
    Redis::zincrby('trending_article', 1, $article);
    return $article;

});




Route::get('video/{id}', function ($id) {
    $downloads = Redis::get("video.{$id}.downloads");
    return view('welcome')->with('downloads', $downloads);
});


Route::get('video/{id}/download', function ($id) {
    Redis::incr("video.{$id}.downloads");
    return back();
});

Route::get('broadcast', function () {
    event(new UserHasRegistered('charming phobia'));
    return 'Done';
});

Route::get('test', ['middleware'=>'subscribed:yearly',function () {
    return "subscription only page";
}]);


Route::get('/tasks', "TasksController@index");
Route::get('/tasks/{task}', "TasksController@show");
Route::get('/posts/create', "PostsController@create");
Route::get('/posts', "PostsController@index")->name('home');
Route::get('/posts/{post}', "PostsController@show");
Route::get('/posts/tags/{tag}', "TagsController@index");
Route::post('/posts', "PostsController@store");
Route::post('/posts/{post}/comments', "CommentsController@store");

Route::get('/register', "RegistrationController@create");
Route::post('/register', "RegistrationController@store");
Route::get('/login', "SessionsController@create");
Route::post('/login', "SessionsController@store");
Route::get('/logout', "SessionsController@destroy");



function remember($key, $minutes, $callback){
    if($value = Redis::get($key)){
        return json_decode($value);
    }

    Redis::setex($key, $minutes, $value = $callback());
    return $value;
}

Route::get('/', function (){
//    return Cache::remember('articles.all', 60*60, function (){
//        return App\Article::all();});
    return view('text');

});

Route::get('/user/{id}/stats', function ($id){

    return Redis::hgetall("user.{$id}.stats");
});

Route::get('favorite-video', function (){

     Redis::hincrby("user.1.stats", 'favorites', 1);
    return redirect('/');
});


//
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
