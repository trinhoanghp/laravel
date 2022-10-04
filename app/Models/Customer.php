<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// class Customer extends Model
class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function scopeSearch($query)
    {
        if(request('key'))
        {
            $key = request('key');
          
            $query = $query->where('customer_name','like','%'.$key.'%');
        }
        if(request('phone'))
        {
            $key = request('phone');
          
            $query = $query->where('phone','like','%'.$key.'%');
        }
        if(request('id'))
        {
            $id = request('id');        
            $query = $query->where('id',$id);
        }
    
    
    }

}
