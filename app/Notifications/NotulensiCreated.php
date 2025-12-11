<?php

namespace App\Notifications;

use App\Models\Notulensi;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NotulensiCreated extends Notification
{
    use Queueable;

    public function __construct(public Notulensi $notulensi)
    {
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toArray($notifiable): array
    {
        return [
            'title' => 'Notulensi Rapat Baru',
            'message' => "Notulensi rapat '{$this->notulensi->title}' telah dibuat.",
            'notulensi_id' => $this->notulensi->id,
            'created_by' => $this->notulensi->user->name,
        ];
    }
}
