<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['bus_id', 'location_id', 'departure_time', 'arrival_time', 'date'];
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
    public function seatAllocations(): HasMany
    {
        return $this->hasMany(SeatAllocation::class);
    }

    public function bus(): BelongsTo
    {
        return $this->belongsTo(Bus::class);
    }
}
