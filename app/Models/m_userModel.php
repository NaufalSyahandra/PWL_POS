<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_userModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; //to define the name of the table used
    protected $primaryKey = 'user_id'; //to define the primary key of the table used
}
