<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'complete',
    ];

    protected $casts = [
      'complete' => 'boolean'
    ];

    public function sinceUpdated(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->updated_at->diffForHumans(),
            set: fn ($value) => strtolower($value),
        );
    }
    public function scopeInProgressAssignments(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->query()->where('complete', false);
    }

    public function scopeCompleteAssignments(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->query()->where('complete', true);
    }
}
