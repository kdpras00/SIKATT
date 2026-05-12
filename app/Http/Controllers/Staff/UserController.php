<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = $request->get('role');
        
        $users = User::when($role, function ($query, $role) {
                return $query->role($role);
            })
            ->latest()
            ->paginate(10);

        return view('staff.users.index', compact('users', 'role'));
    }

    public function create()
    {
        return view('staff.users.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\.]+$/'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:staff,lurah,masyarakat',
            'phone' => 'nullable|numeric|digits_between:10,13',
            'address' => 'nullable|string',
        ];

        if ($request->role === 'masyarakat') {
            $rules['nik'] = 'required|numeric|digits:16|unique:users';
            $rules['kk'] = 'required|numeric|digits:16';
            $rules['gender'] = 'required|in:L,P';
            $rules['birth_place'] = 'required|string|max:255';
            $rules['birth_date'] = 'required|date';
            $rules['religion'] = 'required|string|max:50';
            $rules['job'] = 'required|string|max:100';
        } else {
            $rules['nik'] = 'nullable|numeric|digits:16|unique:users';
        }

        $request->validate($rules);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nik' => $request->nik,
            'kk' => $request->kk,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'job' => $request->job,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('staff.users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('staff.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\.]+$/'],
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:staff,lurah,masyarakat',
            'phone' => 'nullable|numeric|digits_between:10,13',
            'address' => 'nullable|string',
        ];

        if ($request->role === 'masyarakat') {
            $rules['nik'] = 'required|numeric|digits:16|unique:users,nik,' . $user->id;
            $rules['kk'] = 'required|numeric|digits:16';
            $rules['gender'] = 'required|in:L,P';
            $rules['birth_place'] = 'required|string|max:255';
            $rules['birth_date'] = 'required|date';
            $rules['religion'] = 'required|string|max:50';
            $rules['job'] = 'required|string|max:100';
        } else {
             $rules['nik'] = 'nullable|numeric|digits:16|unique:users,nik,' . $user->id;
        }

        $request->validate($rules);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nik' => $request->nik,
            'kk' => $request->kk,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'job' => $request->job,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        $user->syncRoles($request->role);

        return redirect()->route('staff.users.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun sendiri.');
        }
        
        // Prevent deleting associated data issues if needed, but basic delete for now
        $user->delete();

        return redirect()->route('staff.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
