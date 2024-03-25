<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use App\Models\Hotel;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // Check if the user is already authenticated
        if (auth()->check() && auth()->user()->role === 'admin') {
            // If the user is an admin and already logged in, redirect to the dashboard
            return redirect('/dashboard');
        }

        // If not authenticated or not an admin, show the login form

        return view('login');
    }

    public function index()
    {
        $numberOfHotels = Hotel::count();
        $numberOfAgents = User::where('role', 'agent')->where('is_approved', 1)->count();
        $pendingRequests = User::where('is_approved', 0)->orderBy('created_at', 'desc')->paginate(4);

        // return view('admin.index', compact('numberOfHotels', 'numberOfAgents', 'pendingRequests'));
        return view('admin.dashboard', compact('numberOfHotels', 'numberOfAgents', 'pendingRequests'));
    }


    public function acceptRequest(User $user)
    {
        $user->update(['is_approved' => true]);
        return redirect()->back()->withInput()->with('status', 'Agent request accepted successfully.');
    }


    public function rejectRequest(User $user)
    {
        $user->delete();
        return redirect()->back()->with('status', 'Agent request rejected successfully.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('dashboard'); // Redirect to admin dashboard

        } else {
            // Authentication failed
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
        }
    }


    public function logout(Request $request)
    {
        
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        // Clear cookies
        Cookie::queue(Cookie::forget('laravel_session'));
    
        return redirect('login');
    }

    public function showdashboard()
    {
        return view('admin.dashboard');
    }
}
