<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $user = User::query()
            ->select(['fullName', 'email', 'phone', 'address', 'avatar', 'created_at'])
            ->get();

        return view('admin.user.index', [
            'user' => $user
        ]);
    }
}
