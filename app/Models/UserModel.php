<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $guarded = ['userid'];

    protected $table = 'user';
    protected $primaryKey = 'userid';
    public $timestamps = false;

}
