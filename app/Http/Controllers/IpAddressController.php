<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlokModel;
use App\Models\ClientModel;
use App\Services\ConnectionChacker;
use Illuminate\Support\Facades\DB;

class IpAddressController extends Controller
{
    public function index()
    {
        $ip = DB::table('client')->leftJoin('blok', 'blok.id', '=', 'client.blok_id')->select('client.*', 'blok.namaBlok')->get();
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
            return redirect('/ipAddress')->with('success', 'IP Address deleted');
        }catch(\Exception $e){
            return redirect('/ipAddress')->with('error', $e->getMessage());
        }
    }
}
