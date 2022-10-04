<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'display_name',
       
     
    ];
    public function permisstion()
    {
        return $this->belongsToMany(Permisstion::class,'permisstion_roles','role_id','permisstion_id');
    }
  
}
