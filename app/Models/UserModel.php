<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserModel extends Model
{
    use HasFactory;

    protected $guarded = ['userid'];

    protected $table = 'user';
    protected $primaryKey = 'userid';
    public $timestamps = false;

    /**
     * Get the peminjamans associated with the UserModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function peminjamans(): HasMany
    {
        return $this->hasMany(peminjamanModel::class, 'userid', 'userid');
    }
}
