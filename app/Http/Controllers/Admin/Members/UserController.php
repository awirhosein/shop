<?php

namespace App\Http\Controllers\Admin\Members;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::isUser()->latest()->paginate(30);

        return view('admin.pages.members.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.members.users.create');
    }

    public function store(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back_url()
            ? redirect(back_url())
            : redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.pages.members.users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
        ]);

        $user->update($validated);

        return back_url()
            ? redirect(back_url())
            : redirect()->route('admin.users.index');
    }
}