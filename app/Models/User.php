<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];
    public function seatAllocations(): HasMany
    {
        return $this->hasMany(SeatAllocation::class);
    }
}
