<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cog\Likeable\Contracts\Likeable as LikeableContract;
use Cog\Likeable\Traits\Likeable;

class food extends Model implements LikeableContract
{	
    use Likeable;
    
    public function comments()
    {
        return $this->hasMany('App\comment');
    }
}
