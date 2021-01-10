<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Account extends Model
{
	public $table = 'User_Accounts';
	public $timestamps = false;
	public $primaryKey = '_id';
    use HasFactory;
}
