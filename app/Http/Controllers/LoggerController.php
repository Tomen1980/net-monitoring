<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoggingModel;

class LoggerController extends Controller
{

    public function index()
    {

        $logs = LoggingModel::paginate(20);
        return view('logging.index',[
            'logs' => $logs
        ]);
    }

    public function destroy($id){
        $log = LoggingModel::find($id);
        $log->delete();
        return redirect('/logger')->with('success', 'Log deleted');
    }

    public function destroyAll(){
        LoggingModel::truncate();
        return redirect('/logger')->with('success', 'All logs deleted');
    }
}
