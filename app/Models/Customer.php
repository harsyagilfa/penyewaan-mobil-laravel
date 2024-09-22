<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $table='customer';
    protected $fillable = [
        'nama_customer',
        'usia',
        'no_telepon',
        'alamat',
        'pekerjaan',
        'nik',
        'foto_profil',
        'foto_sim',
        'username',
        'password'];

    protected $hidden = ['password','remember_token'];
}
