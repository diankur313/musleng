<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class camera extends Model
{
    use HasFactory;
    protected $table = 'camera';
    protected $fillable=['id_user','num_of_camera'];
}
