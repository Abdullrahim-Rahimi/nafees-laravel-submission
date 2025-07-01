<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'User_id',
        'title',
        'description',
        'priority',
        'due_date',
        'status',
    ];

    protected $casts = [
        'due_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeByStatus (Builder $query, string $status):builder
    {
        return $query->where('status', $status);
    }

    
    public function  scopeByDueDate(Builder $querry, string $date): Builder
    {
        return $querry->where('due_date', $date);

    }

    public function scopeByPriority(Builder $querry, string $priority): Builder
    {
        return $querry->where('priority', $priority);
    }
    
    public function scopeOrderByPriority(Builder $querry): Builder
    {
        return $querry->orderBy("FIELD(priority, 'high','medium','low')");
    }
}