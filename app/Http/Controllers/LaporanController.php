<?php

namespace App\Http\Controllers;

use App\Models\DataSparepart;
use App\Models\DataService;
use App\Models\DataCustomer;
use App\Models\DataTransaksi;
use App\Models\DataPembelian;
use App\Models\ServisPanggilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class LaporanController extends Controller
{

    public function index()
    {
        return view('laporan.index');
    }

    public function cetak(Request $request)
    {
        if($request->tipe == 'pembelian'){
            $pembelian = DataPembelian::all();
 
            $pdf = PDF::loadview('laporan.pembelian',['pembelian'=>$pembelian]);
            return $pdf->stream('laporan-pembelian.pdf');
        }
        else {
            $servispanggilan = ServisPanggilan::all();
 
            $pdf = PDF::loadview('laporan.servispanggilan',['servispanggilan'=>$servispanggilan]);
            return $pdf->stream('laporan-servispanggilan.pdf');
        }
    }
}