<?php

namespace App\Models;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Petugas extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'petugas';
}
