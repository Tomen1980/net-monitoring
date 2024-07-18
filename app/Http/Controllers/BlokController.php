<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlokModel;

class BlokController extends Controller
{
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
            return redirect('/blok')->with('success', 'Blok updated');
        } catch(\Exception $e){
            return redirect('/blok')->with('error', $e->getMessage());
        }
    }

    public function destroy($id){
        $blok = BlokModel::find($id);
        $blok->delete();
        return redirect('/blok')->with('success', 'Blok deleted');
    }
}
