<?php

namespace App\Models;

use App\Enums\AbilityKind;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected function casts()
    {
        return [
            'kind' => AbilityKind::class,
        ];
    }

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }
}

