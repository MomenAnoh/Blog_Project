<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    
    public function Blog()
    {
         return $this->hasMany(Blog::class);
   }
    use HasFactory;

}
