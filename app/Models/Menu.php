<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];

    protected $table = 'menus';

    public function foods()
    {
        return $this->belongsToMany(Food::class)->withPivot('time');
    }

    public function sarapan()
    {
      return $this->belongsToMany(Food::class)->wherePivot('time','sarapan');
    }

    public function makanSiang()
    {
      return $this->belongsToMany(Food::class)->wherePivot('time','makanSiang');
    }

    public function makanMalam()
    {
      return $this->belongsToMany(Food::class)->wherePivot('time','makanMalam');
    }

    public function snack()
    {
      return $this->belongsToMany(Food::class)->wherePivot('time','snack');
    }
}
