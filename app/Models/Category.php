<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{   
    use SoftDeletes;
    use HasFactory;
    protected $dates= ['delete_at'];
    protected $fillable = [
        'name',
        'parent_id',
        'slug',
    ];
    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }   
    public function CategoryChilds()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }  
    public function scopeSearch($query)
    {
        if (request('key')) {
            $key = request('key');

            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        if (request('category_id')) {
            $category_id = request('category_id');
            $query = $query->where('parent_id', $category_id);
        }
        if (request('sortlist')) {
            $sortlist = request('sortlist');
            $mang = explode('-', $sortlist);
             $query = $query->orderBy($mang[0], $mang[1]);          
        }
        return $query;
    }
}
