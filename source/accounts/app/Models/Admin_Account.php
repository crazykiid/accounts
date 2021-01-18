<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_Account extends Model
{
	public $table = 'admin_accounts';
	public $timestamps = false;
	public $primaryKey = '_id';
    use HasFactory;
}
