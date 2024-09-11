<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Home extends Model
{
    use HasFactory;

    protected $fillable = ['home_ar', 'home_en', 'home_type', 'home_image'];


}
