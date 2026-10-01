<?php

namespace App\Models;

use App\AbilityKind;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected function casts()
    {
        return [
            'kind' => AbilityKind::class,
        ];
    }
}

