<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = "perusahaan";
    protected $guarded = ['id'];

    public function relasi_email()
    {
        return $this->hasMany(EmailPerusahaan::class);
    }

    public function relasi_kargo()
    {
        return $this->hasMany(KargoPerusahaan::class);
    }
}
