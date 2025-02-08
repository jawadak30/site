<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        // Retrieve users who have the 'user' role
        $users = User::where('role', 'user')->latest()->paginate(5);


        return view('backend.user.user', compact('users'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return back()->with('success', 'User baru telah terbuat');
    }


    public function show($id)
    {
        return view('backend.user.user', [
            'users' => User::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
        ]);

        // Update the user
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Only update password if it's provided
        if ($validated['password']) {
            $user->password = bcrypt($validated['password']);
        }

        // Update the role
        $user->role = $validated['role'];

        $user->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('success', 'User berhasil dihapus');
    }





    // Display the profile page
    public function profile()
    {
        $user = Auth::user();  // Get the authenticated user
        return view('backend.user.profile', compact('user'));
    }

    // Update the profile details
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    // Display the settings page
    public function settings()
    {
        return view('backend.user.settings');
    }

    // Update settings (e.g., change password)
    public function updateSettings(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('settings')->with('success', 'Password updated successfully!');
    }
}
