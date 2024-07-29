<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\ClientModel;
use App\Models\BlokModel;
use App\Services\ConnectionChacker;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TeleNotification;
use App\Notifications\TitleNotification;
use App\Notifications\SendReportTeleNotification;
// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->hourly();

Artisan::command('app:test-update-network', function () {
    $ip = ClientModel::all();
    foreach ($ip as $item) {
        $newStatus = ConnectionChacker::check($item->ipAddress);
        $item->status = $newStatus;
        $item->save();
    }
})->everyThreeMinutes();

// Menampilkan pemberitahuan

// Artisan::command('app:information-update', function () {
//     Notification::route('telegram', '-1002198842519')->notify(new TitleNotification());
// })->everyThreeMinutes();

// Menampilkan semua status

// Artisan::command('app:send-notification', function () {
//     $blok = BlokModel::select('id', 'namaBlok')->get();
//     foreach ($blok as $item) {
//         Notification::route('telegram', '-1002198842519')->notify(new TeleNotification($item->namaBlok, $item->id));
//     }
// })->everyFiveMinutes();

Artisan::command('app:sendReport', function () {
    Notification::route('telegram', '-1002198842519')->notify(new SendReportTeleNotification());
})->everyTenMinutes();
