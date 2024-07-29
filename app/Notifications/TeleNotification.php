<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;
use NotificationChannels\Telegram\TelegramChannel;
use App\Models\ClientModel;
use Carbon\Carbon;

class TeleNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $blokName, $idBlok;
    public function __construct($blokName, $idBlok)
    {
        $this->blokName = $blokName;
        $this->idBlok = $idBlok;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toTelegram(object $notifiable)
    {
        $now = Carbon::now('Asia/Jakarta');
        $today = $now->toDateString();
        $time = $now->format('H:i:s');
        $ips = ClientModel::where('blok_id', $this->idBlok)->get();
        $ipArray = [];

        if (count($ips) < 0) {
            try {
                return TelegramMessage::create()
                    ->to('-1002198842519')
                    ->content('Ip Address Not Found');
            } catch (\Exception $ex) {
                \Log::error($ex);
            }
        } else {
            foreach ($ips as $ip) {
                $ipArray[] = [
                    'ip' => $ip->ipAddress,
                    'nama' => $ip->namaClient,
                    'status' => $ip->status,
                ];
            }
        }

        try {
            $messageLines = array_map(function ($item) {
                return "{$item['ip']} | {$item['nama']} | {$item['status']}";
            }, $ipArray);
            $messageContent = implode("\n", $messageLines);

            return TelegramMessage::create()
                ->to('-1002198842519')
                ->content($this->blokName."\n" . $messageContent);
        } catch (\Exception $ex) {
            \Log::error($ex);
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
                //
            ];
    }
}
