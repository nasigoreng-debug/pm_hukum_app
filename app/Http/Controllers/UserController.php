<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('level', 'asc')->get();
        $title = 'User';

        return view('user.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah User';

        return view('user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6',
            'level' => 'required|integer',
            'foto_user' => 'required|image|mimes:jpg,png|max:1024',
        ], [
            'name.required' => 'Nama wajib diisi!!',
            'username.required' => 'Username wajib diisi!!',
            'username.unique' => 'Username sudah digunakan!!',
            'password.required' => 'Password wajib diisi!!',
            'password.min' => 'Password minimal 6 karakter!!',
            'level.required' => 'Role wajib diisi!!',
            'foto_user.required' => 'Foto wajib diupload!!',
            'foto_user.image' => 'File harus berupa gambar!!',
            'foto_user.mimes' => 'Jenis file harus JPG atau PNG!!',
            'foto_user.max' => 'Ukuran file maksimal 1MB!!',
        ]);

        $data = $request->only(['name', 'username', 'level']);
        $data['password'] = Hash::make($request->password);

        // Upload foto user
        if ($request->hasFile('foto_user')) {
            $file = $request->file('foto_user');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('users', $fileName, 'public');
            $data['foto_user'] = $fileName;
        }

        User::create($data);

        return redirect()->route('users.index')
            ->with('pesan', 'User berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $title = 'Detail User';

        return view('user.show', compact('user', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $title = 'Edit User';

        return view('user.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:6',
            'level' => 'required|integer',
            'foto_user' => 'nullable|image|mimes:jpg,png|max:1024',
        ], [
            'name.required' => 'Nama wajib diisi!!',
            'username.required' => 'Username wajib diisi!!',
            'username.unique' => 'Username sudah digunakan!!',
            'password.min' => 'Password minimal 6 karakter!!',
            'level.required' => 'Role wajib diisi!!',
            'foto_user.image' => 'File harus berupa gambar!!',
            'foto_user.mimes' => 'Jenis file harus JPG atau PNG!!',
            'foto_user.max' => 'Ukuran file maksimal 1MB!!',
        ]);

        $data = $request->only(['name', 'username', 'level']);

        // Update password jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Upload foto user baru jika ada
        if ($request->hasFile('foto_user')) {
            // Hapus foto lama jika ada
            if ($user->foto_user) {
                Storage::disk('public')->delete('users/' . $user->foto_user);
            }

            $file = $request->file('foto_user');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('users', $fileName, 'public');
            $data['foto_user'] = $fileName;
        }

        $user->update($data);

        return redirect()->route('users.index')
            ->with('pesan', 'Data user berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    try {
        $user = User::findOrFail($id);

        \Log::info('Deleting user', [
            'id' => $user->id,
            'name' => $user->name,
            'foto_user' => $user->foto_user
        ]);

        // Hapus foto user jika ada
        if ($user->foto_user) {
            $filePath = 'users/' . $user->foto_user;
            if (Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
        }

        $user->delete();

        // PERBAIKAN: Hapus spasi di route name
        return redirect()->route('users.index')
            ->with('pesan', 'User berhasil dihapus.');

    } catch (\Exception $e) {
        \Log::error('Delete user error: ' . $e->getMessage());
        return redirect()->route('users.index')
            ->with('pesan', 'Gagal menghapus user: ' . $e->getMessage());
    }
}
    /**
     * Method lama untuk kompatibilitas
     */
    
}