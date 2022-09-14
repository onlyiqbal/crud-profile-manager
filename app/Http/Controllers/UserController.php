<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function edit(User $user)
    {
        $time = strtotime($user->tanggal_lahir);

        $user['tgl'] = date('d', $time);
        $user['bln'] = date('m', $time);
        $user['thn'] = date('Y', $time);

        return response()->view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $tanggal_lahir = $request['thn'] . str_pad($request['bln'], 2, 0, STR_PAD_LEFT) . str_pad($request['tgl'], 2, 0, STR_PAD_LEFT);

        $request['tanggal_lahir'] = $tanggal_lahir;

        $validateData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'nama' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before:-10 years', 'after:-100 years'],
            'pekerjaan' => ['sometimes', 'nullable', 'string', 'max:255'],
            'kota' => ['sometimes', 'nullable', 'string', 'max:255'],
            'bio_profil' => ['sometimes', 'nullable', 'string'],
            'gambar_profil' => ['sometimes', 'file', 'image', 'max:2000'],
            'background_profil' => ['required', 'integer', 'min:1', 'max:12']
        ]);

        if ($request->hasFile('gambar_profil')) {
            $slug = Str::slug($request['nama']);

            $extFile = $request->gambar_profil->getClientOriginalExtension();

            $namaFile = $slug . '-' . time() . '.' . $extFile;

            $request->gambar_profil->storeAs('public/uploads', $namaFile);
        } else {
            $namaFile = $request->gambar_profil;
        }

        $validateData['gambar_profil'] = $namaFile;

        $user->update($validateData);

        return redirect('/#member-list')->with(['pesan' => 'update', 'nama' => $user->nama]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/#member-list')->with(['pesan' => 'delete', 'nama' => $user->nama]);
    }
}
