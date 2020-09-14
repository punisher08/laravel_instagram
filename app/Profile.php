<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Profile extends Model
{
    protected $guarded =[];


    public function profileImage(){

        // $b=$this->image:'profile/mHJkSIqoHvz4SGNeB9I3bVVUWeBYn5iQqG43L462.png';
        // $x= ;
        // return (($this->image)) ?? (($this->image).'profile/mHJkSIqoHvz4SGNeB9I3bVVUWeBYn5iQqG43L462.png');
        $imagePath = ($this->image) ? $this->image:'profile/mHJkSIqoHvz4SGNeB9I3bVVUWeBYn5iQqG43L462.png';
        return $imagePath;
    }
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function followers(){

        return $this->belongsToMany(User::class);
    }
}
