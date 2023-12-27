<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['bus_name', 'bus_model', 'total_seat'];

    public function seatAllocations(): HasMany
    {
        return $this->hasMany(SeatAllocation::class, 'bus_id');
    }
}
