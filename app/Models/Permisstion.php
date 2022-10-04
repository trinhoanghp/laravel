<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisstion extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'display_name',
        'parent_id',
    ]; 
    public function rolesChild()
    {
        return $this->hasMany(Permisstion::class,'parent_id');
    }
}
