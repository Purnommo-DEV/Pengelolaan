<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KargoPerusahaan extends Model
{
    use HasFactory;
    protected $table = "kargo_perusahaan";
    protected $guarded = ['id'];
}
