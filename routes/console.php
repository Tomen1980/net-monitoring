<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\ClientModel;
use App\Models\BlokModel;
use App\Services\ConnectionChacker;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TeleNotification;
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
})->everyMinute();

Artisan::command('app:send-notification', function () {
    $blok = BlokModel::select('namaBlok')->get();
    foreach ($blok as $item) {
        Notification::route('telegram', '5172910639')->notify(new TeleNotification($item->namaBlok));
    }
});
