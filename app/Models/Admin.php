<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//added by milind on 10012021 for admin login
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
//end of added by milind on 10012021 for admin login
class Admin extends Authenticatable
{
    use HasFactory;
    //added by milind on 10012021 for admin login
    use Notifiable;

    protected $table = 'admins';
    protected $guarded = array();
    //end of added by milind on 10012021 for admin login
}
