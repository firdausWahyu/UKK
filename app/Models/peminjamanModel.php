<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjamanModel extends Model
{
    use HasFactory;

    
    protected $guarded = ['peminjamanid'];

    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjamanid';
    public $timestamps = false;
}
