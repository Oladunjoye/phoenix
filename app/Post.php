<?php
namespace App;

use App\Category;
use App\Post ;
use Session;
use Imaage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //

    use SoftDeletes;

     protected $fillable = [
        'title', 'feature','content', 'category_id','slug'
    ];

    public function getFeatureAttribute($feature){
    	return asset($feature);
    }

    protected $dates = ['deleted_at'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');

    }
}
