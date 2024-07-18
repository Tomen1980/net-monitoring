<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\ClientModel;
use App\Models\BlokModel;
use App\Services\ConnectionChacker;
// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->hourly();

Artisan::command('app:test-update-network', function () {
   $ip = ClientModel::all();
    foreach($ip as $item){
        $newStatus = ConnectionChacker::check($item->ipAddress);
        $item->status = $newStatus;
        $item->save();
    }
})->everyMinute();



