<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = ['name','surname', 'description', 'cost', 'img_profile', 'img_full'];

    /**
     * returns the fullname of the character ('Name Surname')
     * @return string
     */
    public function getFullName()
    {
        return $this->name . ' ' . $this->surname;
    }

}
