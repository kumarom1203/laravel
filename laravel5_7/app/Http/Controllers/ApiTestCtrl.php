<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests ;
use App\Model\Article;
use Validator;
class ApiTestCtrl extends Controller
{
	 public function index(){
    	echo "Nothing to show in this context";
    }
    public function getapi($id){
    	echo "this is get api - @ -".$id;
    }
     public function postapi(Request $request)
     {
    	echo "this is post api<br><pre>";
    	print_r($request->input());
    	// Insert data into table
    }
    public function deleteapi($id)
     {
    	echo "this is delete api  - @ -".$id;
     }
      public function putapi($id)
     {
    	echo "this is put api  - @ -".$id;
     }

     public function patchapi($id)
     {
    	echo "this is patch api  - @ -".$id;
     }
       public function insert()
     {
       echo "INSERT DATA INTO";
       // GET INSERT ID 
       /*
       $article=new Article;
       $article->descriptions='this is new article';

       $article->fill([array]); // aditional data may be filled


       $article->save();
       echo $article->id;
       */
       $data=array('descriptions'=>'this is new article');
       $article=Article::create($data); 
       echo $article->id;

     }

    public function update($id)
     {
        $article=Article::find($id);
        echo "<pre>";
        print_r($article);
        $article->delete();
     }

      public function delete($id)
     {
        $article=Article::find($id);
        echo "<pre>";
        print_r($article);
        $article->delete();

        // OR CALL DESTROY
        Article::destroy($id);
     }

    public function formdata(Request $request){
        echo "<h1>FORM DATA SUBMITED</h1><pr>";
        print_r($request->all());  // only, exept, all
        echo "<br>";
        $data=array(
                     'name'=>$request->get('name'),
                     'mobile'=>$request->get('mobile'),
                     'email'=>$request->get('email'),
                  );
        print_r($data);
        echo $request->name; // its also worked gives names
        // echo csrf_token();  // print CSRF TOKEN
        // Validation Calls

            /* use Validator*/  
     /*  old methods
        $rule=array(
                    'name'=>['required','alpha'],
                    'mobile'=>['required'],
                    'email'=>['required','alpha']
                   );
       
        $validator=Validator::make($data, $rule);
        if($validator->fails()){
        return back();
        }
       
       */

        /* NEW METHODS*/
         $rule=array(
                    'name'=>['required','alpha'],
                    'mobile'=>['required'],
                    'email'=>['required','alpha']
                   );
       // $this->validate($request, $rule);   // without custom error message.

        // if validation failed it will redirect to back automatically

        // TO PRESERVING INPUT DATA NEED TO START SESSION BECOZ DATA PRESERVING TAKES PLACE VIA FLASH SESSION
                   // practically not worked need form builder and also display forms errors


        // you can validate for via REQUEST METHODS CREATE NEW REQUEST IN ap\http\ write code in 
        
        // ViewErrorBag to Display the error 

        // Customization of error message 

         // With custom message
         $errorMsg=array(
                         'required'=>'you :attribute must filed the ',
                         'alpha'   =>'only alphabets are allowed here'  
                      ); 


          $errorMsg=array(
                         'name.required'=>'you :attribute must filed the ', // For individual text field validation
                         'alpha'   =>'only alphabets are allowed here'  
                      ); 

         $this->validate($request, $rule, $errorMsg); 

     }
     public function setsession(Request $request){
          //$session=$request->session();
          $session=session(); // no need to inject Request directly  
          $session->put('data', 'some data in session');
     }

       public function getsession(Request $request){
         // $session=$request->session();
         $session=session();
         echo $session->get('data');
         echo "<br>";
         echo $session->get('data2','data2 not exist');
         echo "<br>";
         echo $session->get('data2',function(){
         return '5+6='.(5+6); // You can pass clouser function also in session and manupulate data in
          });

         $session->forget('data'); // to delete the session data

         // for setting a flash session data
         $session->flash('data', 'some data in session');  

         $session->reflash(); // to get data on one more request
         echo $session->get('data');
         //echo "<pre>";
         //print_r(session());
     }
     public function querybuilder(){
        // select * from table ***  never use * its reduces performance.
     }
}
