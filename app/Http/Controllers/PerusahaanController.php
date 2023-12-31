<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\EmailPerusahaan;
use App\Models\KargoPerusahaan;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class PerusahaanController extends Controller
{
    public function fn_perusahaan(Request $request)
    {
        $data_port = Port::get();
        if ($request->ajax()) {
            $data = Perusahaan::with('relasi_email')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<div class="d-flex justify-content-evenly">';
                    $button .= '<button type="button" name="edit-perusahaan" id="' . $data->id . '" class="edit-perusahaan btn btn-info btn-sm">Edit</button>';
                    $button .= '<button type="button" name="hapus-perusahaan" id="' . $data->id . '" class="hapus-perusahaan btn btn-primary btn-sm">Delete</button>';
                    $button .= '</div>';
                    return $button;
                })
                ->addColumn('email', function ($data) {
                    $email = [];
                    foreach ($data->relasi_email as  $value) {
                        $email[] = $value->email;
                    }
                    return $email;
                })
                ->make(true);
        }
        return view('Manajemen.Perusahaan.perusahaan', compact('data_port'));
    }

    public function fn_data_port($id)
    {
        if (request()->ajax()) {
            $data = Perusahaan::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function fn_hapus_data_perusahaan($id)
    {
        if (request()->ajax()) {
            $data = Perusahaan::findOrFail($id);
            $data->delete();
            return response()->json([
                'status_berhasil_hapus' => 1,
                'msg' => 'Data Berhasil di Hapus'
            ]);
        }
    }

    public function fn_proses_tambah_perusahaan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required',
            'kode_perusahaan' => 'required|unique:perusahaan,kode_perusahaan',
            'siup' => 'required',
            'npwp' => 'required|max:16',
            'cp' => 'required',
            'phone' => 'required|numeric|regex:/^([0-9\s\-\+\(\)]*)$/|min:12',
            'alamat' => 'required',
            'email.*' => 'required|email',
            'port_loading.*' => 'required',
            'port_discharge.*' => 'required',
            'freight.*' => 'required',
        ], [
            'nama_perusahaan.required' => 'Wajib diisi',
            'kode_perusahaan.required' => 'Wajib diisi',
            'kode_perusahaan.unique' => 'Kode ini telah terdaftar',
            'siup.required' => 'Wajib diisi',
            'npwp.required' => 'Wajib diisi',
            'npwp.max' => 'Minimal 16 angka',
            'cp.required' => 'Wajib diisi',
            'phone.required' => 'Wajib diisi',
            'phone.min' => 'Minimal 12 angka',
            'phone.numeric' => 'Wajib berupa angka',
            'alamat.required' => 'Wajib diisi',
            'email.*.required' => 'Wajib diisi',
            'port_loading.*.required' => 'Wajib diisi',
            'port_discharge.*.required' => 'Wajib diisi',
            'freight.*.required' => 'Wajib diisi'
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status_form_kosong' => 1,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $simpan_perusahaan = Perusahaan::create(
                [
                    'nama_perusahaan' => $request->nama_perusahaan,
                    'kode_perusahaan' => $request->kode_perusahaan,
                    'siup' => $request->siup,
                    'npwp' => $request->npwp,
                    'cp' => $request->cp,
                    'phone' => $request->phone,
                    'alamat' => $request->alamat,
                ]
            );

            $var_email = $request->input('email');
            for ($x = 0; $x < count($var_email); $x++) {
                $tampung_email = $var_email[$x];
                EmailPerusahaan::create([
                    'perusahaan_id' => $simpan_perusahaan->id,
                    'email' => $tampung_email
                ]);
            }

            $var_port_loading = $request->input('port_loading');
            $var_port_discharge = $request->input('port_discharge');
            $var_freight = $request->input('freight');
            for ($x = 0; $x < count($var_port_loading); $x++) {
                $tampung_var_port_loading = $var_port_loading[$x];
                $tampung_var_port_discharge = $var_port_discharge[$x];
                $tampung_freight = $var_freight[$x];

                KargoPerusahaan::create([
                    'perusahaan_id' => $simpan_perusahaan->id,
                    'port_loading' => $tampung_var_port_loading,
                    'port_discharge' => $tampung_var_port_discharge,
                    'freight' => $tampung_freight
                ]);
            }

            return response()->json([
                'status_berhasil' => 1,
                'msg' => 'Data Berhasil di Input'
            ]);
        }
    }
}
