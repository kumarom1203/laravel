<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Article extends Controller
{
	 public function postapi(Request $request)
     {
    	 echo "this is post api<br><pre>";
    	 print_r($request->input());
      }
     public function getapi($id)
     {
    	echo "this is get api - @ -".$id;
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
///////////////////////////////////////////////////////////////////
      public function insert()
     {
       echo "INSERT DATA INTO";
       // GET INSERT ID 
       $article=new Article;
       $article->descriptions='this is new article';
       $article->save();
     }
}
