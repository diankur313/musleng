<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;
    
    protected $table = 'activity';
    protected $primaryKey = 'id_activity';

     public function activity_event()
    {
        return $this->belongsTo('App\event','id_event');
    }

    public function activity_user()
    {
        return $this->belongsTo('App\user','id');
    }
}
