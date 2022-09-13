<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
