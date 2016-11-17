<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\School;
use App\User;

class Comment extends Model
{
    public $fillable = ['comment', 'school_id', 'user_id'];
    
    public function school() {
        return $this->belongsTo('App\School', 'school_id', 'id');
    }
    
     public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    
    
     /**
     * Scope a query to only include popular users.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
   
    
}
