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

use App\UuidTest;
use Webpatser\Uuid\Uuid;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('projects', 'ProjectController');
Route::resource('task', 'TaskController');
Route::post('/projects/{project}/tasks', 'ProjectController@task_store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/locale',function(){
    App::setlocale('en');
    return __('text.welcome',['name'=>'MuhammedAli']);
});
Route::get('/uuid',function(){

    $uuids= factory(UuidTest::class,1)->create();
         $uuids=UuidTest::all()->where('id','=',100);

         $uuid = Uuid::import('d3d29d70-1d25-11e3-8591-034165a3a613');
         $uuid = Uuid::generate(1);
dd($uuid->time);


    return $uuid;
});
