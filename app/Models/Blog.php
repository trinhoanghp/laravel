<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'image_path',
        'user_id',
        'content',
        'status'
    ];
    public function scopeSearch($query)
    {
        if (request('key')) {
            $key = request('key');

            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        if (request('status')) {
            $status = request('status') == 2 ? 0 : 1;
            $query = $query->where('status', $status);
        }
        if (request('sortlist')) {
            $sortlist = request('sortlist');
            $mang = explode('-', $sortlist);
             $query = $query->orderBy($mang[0], $mang[1]);          
        }
        return $query;
    }
}
