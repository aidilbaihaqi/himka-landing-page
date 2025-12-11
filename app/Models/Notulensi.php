<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notulensi extends Model
{
    use HasFactory;

    protected $table = 'notulensi';

    protected $fillable = [
        'user_id', 'title', 'meeting_date', 'meeting_time', 'location',
        'attendees', 'agenda', 'discussion', 'decisions', 'action_items', 'attachment'
    ];

    protected $casts = [
        'meeting_date' => 'date',
        'meeting_time' => 'datetime:H:i',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
