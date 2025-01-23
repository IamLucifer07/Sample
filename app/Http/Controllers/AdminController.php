<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Middleware to ensure only admins can access this controller
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role !== 'admin') {
                return redirect('/'); // Redirect non-admin users
            }

            return $next($request);
        });
    }

    // Display all users
    public function index()
    {
        $users = User::all(); // Get all users
        return view('admin', compact('users'));
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.index')->with('success', 'User deleted successfully.');
    }
}
