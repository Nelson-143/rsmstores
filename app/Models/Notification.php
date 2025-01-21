<?php

namespace App\Models;

use Illuminate\Notifications\DatabaseNotification as NotificationBase;

class Notification extends NotificationBase
{
    /**
     * The table associated with the model.
     */
    protected $table = 'notifications';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     */
    public $incrementing = false; // Since the ID is a UUID

    /**
     * The data type of the primary key.
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'id',
        'type',
        'notifiable_id',
        'notifiable_type',
        'data',
        'read_at',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'data' => 'array', // Ensure the data is always treated as an array
        'read_at' => 'datetime',
    ];

    /**
     * Define a polymorphic relationship to the notifiable model.
     */
    public function notifiable()
    {
        return $this->morphTo();
    }

    /**
     * Scope for fetching unread notifications.
     */
    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    /**
     * Scope for fetching read notifications.
     */
    public function scopeRead($query)
    {
        return $query->whereNotNull('read_at');
    }
}