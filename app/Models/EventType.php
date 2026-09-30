<?php

namespace App\Models;

use App\EventTypes;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected function casts()
    {
        return [
            'type' => EventTypes::class,
        ];
    }
}
