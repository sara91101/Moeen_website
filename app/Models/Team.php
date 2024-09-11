<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['ar_name', 'en_name', 'ar_job', 'en_job', 'image'];

}
