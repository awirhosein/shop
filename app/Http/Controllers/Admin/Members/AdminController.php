<?php

namespace App\Http\Controllers\Admin\Members;

use App\Models\User;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::isAdmin()->latest()->paginate(30);

        return view('admin.pages.members.admins.index', compact('admins'));
    }
}
