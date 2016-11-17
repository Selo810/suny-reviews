<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public $fillable = ['school_name', 'description', 'image', 'street', 'city', 'state', 'zip'];
    
    public function comments() {
        return $this->hasMany(Comment::class);
        
    }

    public function rates() {
        return $this->hasMany(Rate::class);
    }
    
    /**
     * Scope a query to only include popular users.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    
}
