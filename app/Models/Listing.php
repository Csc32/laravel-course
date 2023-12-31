<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'email',
        'tags',
        'description',
        'user_id'
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            return  $query->where('tags', 'like', '%' . $filters['tag'] . "%");
        }
        if ($filters['search'] ?? false) {
            return  $query->where('title', 'like', '%' . $filters['search'] . "%")->orWhere('description', 'like', '%' . $filters['search'] . "%")->orWhere('tags', 'like', '%' . $filters['search'] . "%");
        }
    }
    //relationships to user
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
