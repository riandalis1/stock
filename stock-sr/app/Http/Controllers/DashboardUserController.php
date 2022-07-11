<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use App\Models\Stock;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::latest()->paginate(50)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'                  => 'required|max:255',
            'username'              => 'required|unique:users',
            'email'                 => 'required',
            'password'              => ['required', 'confirmed', Password::min(8)->numbers()],
            'password_confirmation' => 'required|min:8'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password_confirmation'] = bcrypt($validatedData['password_confirmation']);
        
        $validatedData['email_verified_at'] = now();
        $validatedData['remember_token'] = Str::random(10);

        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'Admin Baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user'         => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name'                      => 'required|max:255',
            'username'                  => 'required',
            'email'                     => 'unique:users,email,'.$user->id,
        ];

        $validatedData = $request->validate($rules);

        User::where('id', $user->id)
                    ->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'Data admin telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Stock::where("user_id", "=", $user->id)->delete();
        Post::where("user_id", "=", $user->id)->delete();
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'Admin telah dihapus!');
    }
}
