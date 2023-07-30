<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use App\Models\Lapangan;
use App\Models\Sewa;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lapangans = Lapangan::all();
        return view('admin.index', compact('lapangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admincreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ': Attribute harus diisi.'
            ];
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'alamat' => 'required',
                'biayaSewa' => 'required',
                'urlFoto' => 'required',
                'deskripsi' => 'required'
            ], $messages);
            if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
            }
            // ELOQUENT
            $lapangan = New Lapangan;
            $lapangan->nama = $request->nama;
            $lapangan->alamat = $request->alamat;
            $lapangan->biayasewa = $request->biayaSewa;
            $lapangan->url_foto = $request->urlFoto;
            $lapangan->deskripsi = $request->deskripsi;
            $lapangan->save();
            Alert::success('Berhasil!', 'Sukses menambahkan data lapangan.');
            return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lapangan = Lapangan::find($id);
        return view('admin.adminedit', compact('lapangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ': Attribute harus diisi.'
            ];
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'alamat' => 'required',
                'biayaSewa' => 'required',
                'urlFoto' => 'required',
                'deskripsi' => 'required'
            ], $messages);
            if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
            }
            // ELOQUENT
            $lapangan = Lapangan::find($id);
            $lapangan->nama = $request->nama;
            $lapangan->alamat = $request->alamat;
            $lapangan->biayasewa = $request->biayaSewa;
            $lapangan->url_foto = $request->urlFoto;
            $lapangan->deskripsi = $request->deskripsi;
            $lapangan->save();
            Alert::success('Berhasil!', 'Berhasil update data lapangan.');
            return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Alert::success('Berhasil!', 'Berhasil hapus data lapangan.');
        Lapangan::find($id)->delete();
        return redirect()->route('admin.index');
    }

    public function reqsewa()
    {
        if (Auth::check()){
            $sewas = Sewa::all();
            return view ('admin/request_sewa_lapangan', compact('sewas'));
        } else {
            return redirect ('/login');
        }
    }

    public function accreqsewa(String $id){
        if (Auth::check()){
            $sewa = Sewa::find($id);
            $sewa->acc = '1';
            $sewa->save();
            return redirect()->route('reqsewa');
        } else {
            return redirect ('/login');
        }
    }

    // Tolak request sewa dan menghapus data request
    public function tlkreqsewa(string $id){
        if (Auth::check()){
            Sewa::find($id)->delete();
            Alert::success('Berhasil!', 'Berhasil menghapus data request sewa lapangan.');
            return redirect()->route('reqsewa');
        } else {
            return redirect ('/login');
        }
    }

    public function accsewa()
    {
        if (Auth::check()){
            $sewas = Sewa::all();
            return view ('admin/acc_sewa_lapangan', compact('sewas'));
        } else {
            return redirect ('/login');
        }
    }

    // Pembatalan acc sewa
    public function btlaccsewa(String $id){
        if (Auth::check()){
            $sewa = Sewa::find($id);
            $sewa->acc = '0';
            $sewa->save();
            return redirect()->route('accsewa');
        } else {
            return redirect ('/login');
        }
    }

    public function exportPdf(string $id)
    {
    $sewas = Sewa::find($id);
    $customPaper = array(0,0,283.80,567.00,);
    $pdf = PDF::loadView('admin/exportPdf', compact('sewas'))->setPaper($customPaper);
    return $pdf->download('tiket.pdf');
    }

}
