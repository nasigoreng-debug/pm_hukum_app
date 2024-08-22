<?php

namespace App\Http\Controllers;

use App\Models\MemberModel;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->MemberModel = new MemberModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'User',
            'member' => $this->MemberModel->allData(),
        ];
        return view('/member/v_member', $data);
    }
    public function edit($id)
    {
        if (!$this->MemberModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'member' => $this->MemberModel->detailData($id),
        ];
        return view('/member/v_edit_member', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'name' => 'required',
            'username' => 'required',
            'level' => 'required',
            'foto_user' => 'mimes:jpg,png|max:1024',

        ], [
            'name' => 'Name wajib diisi!!',
            'username.required' => 'Username wajib diisi!!',
            'level' => 'Level wajib diisi!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->foto_user <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->foto_user;
            $fileName = $file->hashName();
            $file->move(public_path('img'), $fileName);

            $data = [
                'name' => Request()->name,
                'username' => Request()->username,
                'level' => Request()->level,
                'foto_user' => $fileName,
            ];
        } else {
            $data = [
                'name' => Request()->name,
                'username' => Request()->username,
                'level' => Request()->level,
            ];
        }
        $this->MemberModel->editData($id, $data);

        return redirect()->route('member')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id)
    {
        //hapus Data
        $member = $this->MemberModel->detailData($id);
        if ($member->foto_user <> "") {
            unlink(public_path('img') . '/' . $member->foto_user);
        }
        $this->MemberModel->deleteData($id);
        return redirect()->route('member')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
