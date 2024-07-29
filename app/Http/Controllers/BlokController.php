<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlokModel;
use Carbon\Carbon;
use App\Models\LoggingModel;
use Illuminate\Support\Facades\Auth;

class BlokController extends Controller
{
    public $now,$today,$time;
    public function __construct(){
        $this->now = Carbon::now('Asia/Jakarta');
        $this->today = $this->now->toDateString();
        $this->time = $this->now->format('H:i:s');
    }

    public function index()
    {
        
        $bloks = BlokModel::paginate(10);
        // return dd($blok);
        return view('blok.index', [
            'bloks' => $bloks,
        ]);
    }

    public function create(Request $request)
    {
        return view('blok.form', [
            'action' => 'store',
        ]);
    }

    public function store(Request $request){
        $validation = $request->validate([
            'nama_blok' => 'required|min:3|max:255',
            'telpon_blok' => 'required|min:7|numeric',
            'alamat_blok' => 'required|min:3',
        ]);

        try{
            $blok = new BlokModel();
            $blok->namaBlok = $request->nama_blok;
            $blok->telpBlok = $request->telpon_blok;
            $blok->alamatBlok = $request->alamat_blok;
            $blok->save();

            LoggingModel::create([
                'aktivitas' => 'Menambah blok ' . $request->nama_blok,
                'tanggal' => $this->today,
                'waktu' => $this->time,
                'user_id' => Auth::user()->id
            ]);

            return redirect('/blok')->with('success', 'Blok created');
        }catch(\Exception $e){
            return redirect('/blok')->with('error', $e->getMessage());
        }
    }

    public function show($id){
        $blok = BlokModel::find($id);
        return view('blok.form', [
            'action' => 'update',
            'data' => $blok,
        ]);
    }

    public function update(Request $request){
        $validation = $request->validate([
            'nama_blok' => 'required|min:3|max:255',
            'telpon_blok' => 'required|min:7|numeric',
            'alamat_blok' => 'required|min:3',
        ]);
        try{
            $blok = BlokModel::find($request->id);
            $blok->namaBlok = $request->nama_blok;
            $blok->telpBlok = $request->telpon_blok;
            $blok->alamatBlok = $request->alamat_blok;
            $blok->save();

            LoggingModel::create([
                'aktivitas' => 'Mengubah blok dengan id ' . $request->id,
                'tanggal' => $this->today,
                'waktu' => $this->time,
                'user_id' => Auth::user()->id
            ]);

            return redirect('/blok')->with('success', 'Blok updated');
        } catch(\Exception $e){
            return redirect('/blok')->with('error', $e->getMessage());
        }
    }

    public function destroy($id){
        $blok = BlokModel::find($id);
        $blok->delete();

        LoggingModel::create([
            'aktivitas' => 'Menghapus blok dengan id ' . $id,
            'tanggal' => $this->today,
            'waktu' => $this->time,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/blok')->with('success', 'Blok deleted');
    }

    public function getListMonitoring(){
        $bloks = BlokModel::paginate(10);
        // return dd($blok);
        return view('monitoring.listMonitoring', [
            'bloks' => $bloks,
        ]);
    }
}
