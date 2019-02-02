<?php

use Illuminate\Http\Request;
use App\Model\Article;
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
// https://www.toptal.com/laravel/restful-laravel-api-tutorial

// http://localhost:8000/api/users/100
/*
$postdata = [
    'username' => 'user1',
    'password' => 'passuser1',
    'gender'   => 'male',
];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT            => "8000",
  CURLOPT_URL             => "http://localhost:8000/api/users",
  CURLOPT_RETURNTRANSFER  => true,
  CURLOPT_ENCODING        => "",
  CURLOPT_MAXREDIRS       => 10,
  CURLOPT_TIMEOUT         => 30,
  CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST   => "POST",
  CURLOPT_POSTFIELDS      => $postdata,
  CURLOPT_HTTPHEADER      => array(
    "Postman-Token: 86f00973-a642-46e2-86ad-a60c5652ef3f",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) 
{
  echo "cURL Error #:" . $err;
} else 
{
  echo $response;
}
*/
Route::post('users','ApiTestCtrl@postapi');
Route::get('users/{id}','ApiTestCtrl@getapi');
Route::delete('users/{id}','ApiTestCtrl@deleteapi');
Route::put('users/{id}','ApiTestCtrl@putapi');
Route::patch('users/{id}','ApiTestCtrl@patchapi');



// GET ALL RESOURCES
Route::get('rest/users',function(){
	return Article::all();
});


// GET SINGLE RESOURCES BASED ON ID SUPLIED
Route::get('rest/users/{id}',function($id){
	 return Article::find($id);
});


// CREATE NEW RESOURCES
Route::post('rest/users',function(Request $request){
	 return Article::create($request->input());
});


// DELETE RESOURCES
Route::delete('rest/users/{id}',function($id){
	Article::find($id)->delete();
    return 204; // NO CONTENT HTTP RESPONCE CODE
});


// UPDATE RESOURCES
Route::put('rest/users/{id}',function(Request $request, $id){
	  $article = Article::findOrFail($id);
      $article->update($request->input());
      return $article;
});


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');


Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'UserController@details');
});




// REST API WITH AUTHENTICATION 




