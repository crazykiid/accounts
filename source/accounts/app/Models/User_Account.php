<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Account extends Model
{
	public $table = 'user_accounts';
	public $timestamps = false;
	public $primaryKey = '_id';
    use HasFactory;
}
