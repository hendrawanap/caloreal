<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menus extends Model
{
    public function foods()
    {
        return $this->BelongsToMany(Menus::class);
    }
}
