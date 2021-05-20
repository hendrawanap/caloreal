<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Food extends Model
{
    protected $table = 'foods';

    public function menus()
    {
        return $this->belongsToMany(Menu::class)->withPivot('time');
    }
}
