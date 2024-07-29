<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;
use NotificationChannels\Telegram\TelegramChannel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SendReportTeleNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
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
        // $now = Carbon::now('Asia/Jakarta');
        // $today = $now->toDateString();
        // $time = $now->format('H:i:s');

        $data = DB::table('client')->leftJoin('blok', 'blok.id', '=', 'client.blok_id')->select('client.*', 'blok.namaBlok', 'blok.id')->latest('client.id')->where('client.status', '!=', 'Connected')->get();

        if ($data->isNotEmpty()) {
            $messages = [];
            $counter = 1; // Counter untuk nomor urut
            foreach ($data as $item) {
                $messages[] = "{$counter}. Report IP Address: {$item->ipAddress}\nNama: {$item->namaClient}\nStatus: {$item->status}\nBlok: {$item->namaBlok}";
                $counter++; // Increment counter
            }
            $now = Carbon::now('Asia/Jakarta');
            $today = $now->toDateString();
            $time = $now->format('H:i:s');

            // Membagi pesan menjadi kelompok berisi maksimal 10 item
            $chunks = array_chunk($messages, 10);
            foreach ($chunks as $chunk) {
                // Menggabungkan pesan dalam satu batch
                $messageContent = implode("\n\n", $chunk);

                // Mengirim pesan ke Telegram
                TelegramMessage::create()->to('-1002198842519')->content('Informasi Ips ' . $today . ' ' . $time . ' ')->line($messageContent)->send(); // Pastikan `send()` adalah metode yang benar untuk mengirim pesan
            }
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
