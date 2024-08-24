<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    $users = User::where('name', 'LIKE', "%$search%")
        ->orWhereHas('department', function($query) use ($search) {
        $query->where('name', 'LIKE', "%$search%");
        })
        ->orWhereHas('designation', function($query) use ($search) {
        $query->where('name', 'LIKE', "%$search%");
        })->get();
    return view('users.index', ['users' => $users]);
}
}
