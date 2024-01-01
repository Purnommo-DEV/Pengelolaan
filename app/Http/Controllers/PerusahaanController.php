<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Models\Perusahaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EmailPerusahaan;
use App\Models\KargoPerusahaan;
use Illuminate\Validation\Rule;
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
                    $button .= '<a href="edit-data-perusahaan/' . $data->url . '" class="btn btn-info btn-sm">Edit</a>';
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
            function generate_random()
            {
                do {
                    $random = 'Co-' . Str::random(64);
                } while (Perusahaan::where("url", "=", $random)->first());

                return $random;
            }

            $simpan_perusahaan = Perusahaan::create(
                [
                    'url' => generate_random(),
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


    public function fn_edit_data_perusahaan($url)
    {
        $data_perusahaan = Perusahaan::with('relasi_email', 'relasi_kargo')->where('url', $url)->first();
        $data_email = EmailPerusahaan::where('perusahaan_id', $data_perusahaan->id)->get();
        $data_kargo = KargoPerusahaan::where('perusahaan_id', $data_perusahaan->id)->get();
        $data_port = Port::get();
        return view('Manajemen.Perusahaan.edit', compact('data_perusahaan', 'data_email', 'data_kargo', 'data_port'));
    }
    public function fn_proses_edit_data_perusahaan(Request $request, $url)
    {
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required',
            'kode_perusahaan'   =>  'required',
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
            $data_perusahaan = Perusahaan::where('url',  $url)->first();

            $data_perusahaan->update(
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

            foreach ($request->input('email_edit') as $key => $email) {
                $data = EmailPerusahaan::where('id', $request->input('email_id')[$key])->first();
                $data->update([
                    'email' => $request->input('email_edit')[$key]
                ]);
            }

            if ($request->input('email')) {
                $var_email = $request->input('email');
                for ($x = 0; $x < count($var_email); $x++) {
                    $tampung_email = $var_email[$x];
                    EmailPerusahaan::create([
                        'perusahaan_id' => $data_perusahaan->id,
                        'email' => $tampung_email
                    ]);
                }
            }

            foreach ($request->input('port_loading_edit') as $key => $email) {
                $data = KargoPerusahaan::where('id', $request->input('kargo_id')[$key])->first();
                $data->update([
                    'port_loading' => $request->input('port_loading_edit')[$key],
                    'port_discharge' => $request->input('port_discharge_edit')[$key],
                    'freight' => $request->input('freight_edit')[$key]
                ]);
            }


            if ($request->input('port_loading') || $request->input('port_discharge')) {
                $var_port_loading = $request->input('port_loading');
                $var_port_discharge = $request->input('port_discharge');
                $var_freight = $request->input('freight');
                for ($x = 0; $x < count($var_port_loading); $x++) {
                    $tampung_var_port_loading = $var_port_loading[$x];
                    $tampung_var_port_discharge = $var_port_discharge[$x];
                    $tampung_freight = $var_freight[$x];

                    KargoPerusahaan::create([
                        'perusahaan_id' => $data_perusahaan->id,
                        'port_loading' => $tampung_var_port_loading,
                        'port_discharge' => $tampung_var_port_discharge,
                        'freight' => $tampung_freight
                    ]);
                }
            }

            return response()->json([
                'status_berhasil' => 1,
                'msg' => 'Data Berhasil di Input'
            ]);
        }
    }

    public function hapus_email_data_perusahaan($email_id)
    {
        $data_email = EmailPerusahaan::find($email_id);
        $data_email->delete();
        return response()->json([
            
            'status_berhasil_hapus' => 1,
            'msg' => 'Data Berhasil di Hapus'
        ]);
    }

    public function hapus_kargo_data_perusahaan($kargo_id)
    {
        $data_kargo = KargoPerusahaan::find($kargo_id);
        $data_kargo->delete();
        return response()->json([
            'status_berhasil_hapus' => 1,
            'msg' => 'Data Berhasil di Hapus'
        ]);
    }
}
