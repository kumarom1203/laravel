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

Route::get('/', function () 
{
	echo "<h2>This is home page<h2>";
    return view('welcome');
});
/*
Route::get('/', function () 
{
	echo "<h2>This is home page<h2>";
    return view('welcome');
});
Route::get('webwithclouser', function(){
	echo "<h2>This is web with clouser function<h2>";
	return view('welcome');
});
Route::get('webwithctlr','myTestCtrl@index');
Route::get('webwithctlrdatabase','myTestCtrl@withdatabase');
Route::get('webwithctlrdatabasearg','myTestCtrl@withdatabasearg');
Route::get('webwithctlrdatabaseargpost','myTestCtrl@withdatabaseargpost');
Route::get('getData/{id1}/{id2}','myTestCtrl@getData');
Route::post('postData','myTestCtrl@postData');
*/

// MIDLE WARE IN LARAVEL

/*
create middle ware file name LoggerMiddleware

php artisan make:middleware LoggerMiddleware

now register middleware in kernel file in Http Folder

1. protected $middleware: These middleware are run during every request to your application.

2. protected $middlewareGroups: The application's route middleware groups.

3. protected $routeMiddleware: These middleware may be assigned to groups or used individually.


 */
Route::get('middleware', function(){
        echo "Run each time when http call made";    
});
// 
Route::get('middleware_routeMiddleware', function(){
        echo "Run routeMiddleware";    
})->middleware('logger');
/*
->middleware(['logger','logger2', 'logger3']) as array you can pass 

*/


//protected $routeMiddleware:
Route::get('middleware_routeMiddleware_new', 
	         [
	         'uses'=>function(){
                echo "Run routeMiddleware";
             },
              'middleware' =>'logger' // for multiple put array
             ]
            );


/*
//protected $middlewareGroups:
//Route::get('middleware_Groups', 'ctrname')->middleware('web');

//Define like

 protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];


    Route::get('terminate',[
   'middleware' => 'terminate',
   'uses' => 'ABCController@index',
]);

    */

    #Whenever you required to call middleware for more than one url in that case use GROUP ROUTE and set middleware in group.

    Route::group(['middleware'=>['web','logger'], 'prefix'=>'admin-'],function()
       {
       	// PRACTICALLY NOT WORKS
    	Route::get('myname',function(){
    		echo "group middleware";
    	});

    });


   // You Can Also Define Middleware On Controller
    /*
     Create constructor in Controller and 
      public function __construct(){
	   $this->middleware(['web','logger']); // call on every methods called
	   use exept and only
	    $this->middleware(
	              ['logger'],
	              ['only'=>['medthod_name']]); 
                $this->middleware(
	              ['web','auth'],
	              ['exept'=>['medthod_name']]); 
	              or exept method name

	              you can define separtly
      }
    */


      /*
      Dependency Injection
      */



// BLADING IS TEMPLATING ENGINES
Route::get('/blade',function(){
	return view('blade');
});

Route::get('/model','ApiTestCtrl@insert');
Route::get('/update/{id}','ApiTestCtrl@update');


// FROM IN LARAVEL
Route::group(['middleware'=>'web'], function(){
Route::get('/formdata',function(){
	return view('form');
});

Route::post('/postdata','ApiTestCtrl@formdata');
// start vedeo from 36



// get session variable in laravel and save session
Route::get('/setsession','ApiTestCtrl@setsession');
Route::get('/getsession','ApiTestCtrl@getsession');

// DATABSE MIGRATION IN LARAVEL
Route::get('/dbmigration','ApiTestCtrl@dbmigration');
// query builder
Route::get('/querybuilder','ApiTestCtrl@querybuilder');

// Query Log


// Model Relationships 

// One To One Relationships 


});



