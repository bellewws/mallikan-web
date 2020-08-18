<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    public  $table='user_roles';
    protected $fillable = ['role_name'];
}
