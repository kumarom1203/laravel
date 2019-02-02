<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Requests ;
use Illuminate\Support\Facades\Input;
use DB;
class myTestCtrl extends Controller
{
    public function index(){
     echo "<h2>This is web with controller<h2>";
     return view('welcome');
    }
    public function withdatabase()
    {
    	 echo "<h2>This is web with controller and databse</h2>";
    	 
    	$users = DB::table('admin_user')
    	             ->select('*')
    	             ->get()
    	             ->toArray();
    	//print_r($users);
        $query= DB::table('admin_user');
        $query->select('*');
       // $query->where('votes', '>=', 100);
        $result= $query->get();
        echo json_encode($result);

       // Insert query Builder
        $data=array(
        	'admin_user_email'=>'from laravel',
        	'remarks'=>'from laravel remarks',
        );                  
        DB::table('admin_user_log')->insert($data);

        $insertGetId=DB::table('admin_user_log')->insertGetId($data);
        echo "<br>";
        echo "Inserted ".$insertGetId;
    	//return view('dataview')->with(['userData'=>$result]);

    	// Delete query Builder

    	DB::table('admin_user_log')
            ->where('admin_user_log_id', 105)
            ->update($data);

    }
    public function getData($id1, $id2)
    {

     echo "<h2>GET DATA</h2>";
     echo "<pre>";
     echo $id1;
     echo "<br>";
     echo $id2;
     
    }

    public function postData(Request $request)
    {
     echo "<h2>POST DATA</h2>";
     echo "<pre>";
     print_r($request->input());
     //return view('welcome');
    }





     public function withdatabaseargpost()
     {
    	echo "<h2>This is web with controller and databse and argument post method</h2>";
    	 return view('welcome');
    }
}
