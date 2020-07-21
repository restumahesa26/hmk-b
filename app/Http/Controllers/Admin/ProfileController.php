<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('auth.edit', [
            'user' => $request->user()
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->update(
            $request->all()
        );

        return redirect()->route('dashboard');
    }
}
