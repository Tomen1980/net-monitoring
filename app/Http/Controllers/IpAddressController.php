<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlokModel;
use App\Models\ClientModel;
use App\Services\ConnectionChacker;
use Illuminate\Support\Facades\DB;
use App\Models\LoggingModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IpAddressController extends Controller
{
    public $now,$today,$time;
    public function __construct(){
        $this->now = Carbon::now('Asia/Jakarta');
        $this->today = $this->now->toDateString();
        $this->time = $this->now->format('H:i:s');
    }
    public function index()
    {
        $ip = DB::table('client')->leftJoin('blok', 'blok.id', '=', 'client.blok_id')->select('client.*', 'blok.namaBlok')->latest('id')->paginate(7);
        // return dd($ip);
        return view('ipAddress.index', [
            'ips' => $ip,
        ]);
    }

    public function create()
    {
        $option = BlokModel::select('id', 'namaBlok')->get();
        // return dd($option);
        return view('ipAddress.form', [
            'action' => 'create',
            'option' => $option,
        ]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'ip_address' => 'required|ip',
            'client_name' => 'required|min:3|max:255',
            'nama_blok' => 'required',
        ]);

        try {
            $ip = new ClientModel();
            $ip->ipAddress = $request->ip_address;
            $ip->namaClient = $request->client_name;
            $ip->blok_id = $request->nama_blok;
            $ip->status = ConnectionChacker::check($request->ip_address);
            $ip->save();

            LoggingModel::create([
                'aktivitas' => 'Menambah ip ' . $request->ip_address,
                'tanggal' => $this->today,
                'waktu' => $this->time,
                'user_id' => Auth::user()->id
            ]);

            return redirect('/ipAddress')->with('success', 'IP Address created');
        } catch (\Exception $e) {
            return redirect('/ipAddress')->with('error', $e->getMessage());
        }
    }

    public function show($id){
        $ip = DB::table('client')->leftJoin('blok', 'blok.id', '=', 'client.blok_id')->select('client.*', 'blok.namaBlok')->where('client.id', $id)->first();

        $option = BlokModel::select('id', 'namaBlok')->get();
        return view('ipAddress.form', [
            'action' => 'update',
            'data' => $ip,
            'option' => $option,
        ]);
    }

    public function update(Request $request){
        $validation = $request->validate([
            'ip_address' => 'required|ip',
            'client_name' => 'required|min:3|max:255',
            'nama_blok' => 'required',
        ]);
        try{
            $ip = ClientModel::find($request->id);
            $ip->ipAddress = $request->ip_address;
            $ip->namaClient = $request->client_name;
            $ip->blok_id = $request->nama_blok;
            $ip->status = ConnectionChacker::check($request->ip_address);
            $ip->save();

            LoggingModel::create([
                'aktivitas' => 'Mengubah ip pada id ' . $request->id,
                'tanggal' => $this->today,
                'waktu' => $this->time,
                'user_id' => Auth::user()->id
            ]);

            return redirect('/ipAddress')->with('success', 'IP Address updated');
        }catch(\Exception $e){
            return redirect('/ipAddress')->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $ip = ClientModel::find($id);
            // return dd($ip);
            $ip->delete();

            LoggingModel::create([
                'aktivitas' => 'Menghapus ip pada id ' . $id,
                'tanggal' => $this->today,
                'waktu' => $this->time,
                'user_id' => Auth::user()->id
            ]);

            return redirect('/ipAddress')->with('success', 'IP Address deleted');
        }catch(\Exception $e){
            return redirect('/ipAddress')->with('error', $e->getMessage());
        }
    }

    public function showMonitoring($id){
        $ip = DB::table('client')->where('blok_id', $id)->paginate(20);
        $blok = BlokModel::select('namaBlok')->where('id', $id)->first();
        // return dd($blok);
        return view('monitoring.monitoringIp', [
            'ips' => $ip,
            'blokName' => $blok->namaBlok,
        ]);
    }
}
