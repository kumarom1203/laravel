<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class Article extends Model
{
	protected $guarded = ['id', 'created_at', 'updated_at'];
	//protected $guarded = [];
    
}
