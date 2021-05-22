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
        return $this->belongsToMany(Food::class)->withPivot('time')->withTimestamps()->withPivot('quantity');
    }

    public function sarapan()
    {
      return $this->belongsToMany(Food::class)->wherePivot('time','Sarapan')->withPivot('quantity');
    }

    public function makanSiang()
    {
      return $this->belongsToMany(Food::class)->wherePivot('time','Makan Siang')->withPivot('quantity');
    }

    public function makanMalam()
    {
      return $this->belongsToMany(Food::class)->wherePivot('time','Makan Malam')->withPivot('quantity');
    }

    public function snack()
    {
      return $this->belongsToMany(Food::class)->wherePivot('time','Snack')->withPivot('quantity');
    }
}
