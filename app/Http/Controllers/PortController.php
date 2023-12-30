<?php

namespace App\Http\Controllers;

use App\Models\Port;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\DataTables\PortDataTable;
use Illuminate\Support\Facades\Validator;

class PortController extends Controller
{

    public function fn_port(Request $request)
    {
        if ($request->ajax()) {
            $data = Port::get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm"> <i class="bi bi-pencil-square"></i>Edit</button>';
                    return $button;
                })
                ->make(true);
        }
        return view('Manajemen.Port.port');
    }

    public function fn_data_port($id)
    {
        if (request()->ajax()) {
            $data = Port::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function fn_proses_tambah_port(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'port' => 'required'
        ], [
            'port.required' => 'Wajib diisi'
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status_form_kosong' => 1,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            Port::updateOrCreate(
                ['id' => $request->hidden_id],
                [
                    'port' => $request->port
                ]
            );

            return response()->json([
                'status_berhasil' => 1,
                'msg' => 'Data Berhasil di Input'
            ]);
        }
    }
}
