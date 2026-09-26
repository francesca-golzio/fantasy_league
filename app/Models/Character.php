<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = ['name','surname', 'description', 'cost', 'img_profile', 'img_full'];

    public function getFullName()
    {
        return $this->name . ' ' . $this->surname;
    }

}
