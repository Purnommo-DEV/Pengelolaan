<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailPerusahaan extends Model
{
    use HasFactory;
    protected $table = "email_perusahaan";
    protected $guarded = ['id'];
}
