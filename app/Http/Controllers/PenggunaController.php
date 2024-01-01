<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PenggunaController extends Controller
{
    public function fn_pengguna(Request $request)
    {
        $data_pengguna = User::select('id', 'name', 'email')->get();
        if ($request->ajax()) {
            return Datatables::of($data_pengguna)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<div class="d-flex justify-content-evenly">';
                    $button .= '<button type="button" name="edit-pengguna" id="' . $data->id . '" class="edit-pengguna btn btn-info btn-sm">Edit</button>';
                    $button .= '<button type="button" name="hapus-pengguna" id="' . $data->id . '" class="hapus-pengguna btn btn-primary btn-sm">Delete</button>';
                    $button .= '</div>';
                    return $button;
                })
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->addColumn('email', function ($data) {
                    return $data->email;
                })
                ->make(true);
        }
        return view('Manajemen.Pengguna.pengguna', compact('data_pengguna'));
    }

    public function fn_data_pengguna($id)
    {
        if (request()->ajax()) {
            $data = User::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function fn_proses_edit_pengguna(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name_edit' => 'required',
            'email_edit' => 'required|email|unique:users,email,' . $id,
            'password_edit' => 'same:confirm-password',
        ], [
            'name_edit.required' => 'Wajib diisi',
            'email_edit.required' => 'Wajib diisi',
            'email_edit.unique' => 'Email ini telah terdaftar',
            'email_edit.email' => 'Masukkan email yang benar'
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status_form_kosong' => 1,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $input = $request->all();
            if (!empty($input['password_edit'])) {
                $input['password_edit'] = Hash::make($input['password_edit']);
            } else {
                $input = Arr::except($input, array('password'));
            }

            $user = User::find($id);
            $user->update($input);
            return response()->json([
                'status_berhasil' => 1,
                'msg' => 'Data Berhasil di Input'
            ]);

            // DB::table('model_has_roles')->where('model_id',$id)->delete();

            // $user->assignRole($request->input('roles'));

            // return redirect()->route('users.index')
            //                 ->with('success','User updated successfully');
        }
    }

    public function fn_hapus_data_pengguna($id)
    {
        if (request()->ajax()) {
            $data = User::findOrFail($id);
            $data->delete();
            return response()->json([
                'status_berhasil_hapus' => 1,
                'msg' => 'Data Berhasil di Hapus'
            ]);
        }
    }

    public function fn_proses_tambah_pengguna(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Wajib diisi',
            'email.required' => 'Wajib diisi',
            'email.unique' => 'Kode ini telah terdaftar',
            'email.email' => 'Masukkan email yang benar',
            'password.required' => 'Wajib diisi',
            'password.min' => 'Password minimal 8 karakter'
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status_form_kosong' => 1,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            User::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password
                ]
            );

            return response()->json([
                'status_berhasil' => 1,
                'msg' => 'Data Berhasil di Input'
            ]);
        }
    }

    public function fn_role_pengguna(Request $request)
    {
        $data_role = Roles::get();
        if ($request->ajax()) {
            return Datatables::of($data_role)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '<div class="d-flex justify-content-evenly">';
                    $button .= '<button type="button" name="edit-role-pengguna" id="' . $data->id . '" class="edit-role-pengguna btn btn-info btn-sm">Edit</button>';
                    $button .= '<button type="button" name="hapus-role-pengguna" id="' . $data->id . '" class="hapus-role-pengguna btn btn-primary btn-sm">Delete</button>';
                    $button .= '</div>';
                    return $button;
                })
                ->addColumn('name', function ($data) {
                    return $data->name;
                })
                ->make(true);
        }
        return view('Manajemen.Pengguna.role', compact('data_role'));
    }

    public function fn_data_role_pengguna($id)
    {
        if (request()->ajax()) {
            $data = Roles::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function fn_proses_edit_role_pengguna(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name_edit' => 'required'
        ], [
            'name_edit.required' => 'Wajib diisi'
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status_form_kosong' => 1,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            $user = Roles::find($id);


            $user->update([
                'name' => $request->name_edit
            ]);
            return response()->json([
                'status_berhasil' => 1,
                'msg' => 'Data Berhasil di Edit'
            ]);
        }
    }

    public function fn_hapus_data_role_pengguna($id)
    {
        if (request()->ajax()) {
            $data = User::findOrFail($id);
            $data->delete();
            return response()->json([
                'status_berhasil_hapus' => 1,
                'msg' => 'Data Berhasil di Hapus'
            ]);
        }
    }

    public function fn_proses_tambah_role_pengguna(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ], [
            'name.required' => 'Wajib diisi'
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status_form_kosong' => 1,
                'error' => $validator->errors()->toArray()
            ]);
        } else {
            Roles::create(
                [
                    'name' => $request->name,
                    'guard_name' => "web"
                ]
            );

            return response()->json([
                'status_berhasil' => 1,
                'msg' => 'Data Berhasil di Input'
            ]);
        }
    }
}
