<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class foods extends Model
{
    public function menus()
    {
        return $this->BelongsToMany(Foods::class);
    }
}
