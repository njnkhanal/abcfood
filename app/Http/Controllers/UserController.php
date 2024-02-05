<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // to use bootstrap pagination
        Paginator::useBootstrap();
        // grap user with latest user and paginate 20 users
        $users = User::latest()->paginate(20);
        // retur view user index
        return view('admin.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    function getUserData()
    {
        $users = User::select('id', 'first_name', 'last_name', 'email', 'phone_number', 'image', 'role');
        return DataTables::of($users)
            ->addColumn('image', function ($user) {
                $imageUrl = asset($user->image);
                return '<img src="' . $imageUrl . '" alt="User Image" height="45px" width="40px">';
            })
            ->addColumn('action', function ($user) {
                return '<div class="d-flex">
                    <a class="btn btn-primary mr-2"  href="' . route('user.edit', ['user' => $user->id]) . '" id="' . $user->id . '"><i class="bi bi-pencil-square"></i></a>
                    <form action="' . route('user.destroy', ['user' => $user->id]) . '" method="post" id="' . $user->id . '">
                        ' . csrf_field() . '
                        ' . method_field('delete') . '
                        <button type="submit" class="btn btn-danger"><i class="bi bi-backspace-reverse-fill"></i></button>
                    </form>
                </div>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['nullable', 'numeric'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,gif', 'max:3048'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        // set all data from request to the variable $data
        $data = $request->all();

        // store image 
        $image_title = null;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgpath = 'upload/user/';
            $imgname = now()->format('ymdhis') . rand(10000, 99999) . '.' . $img->getClientOriginalExtension();
            $img->move($imgpath, $imgname);
            $image_title = $imgpath . $imgname;
        }

        // set image name 
        $data['image'] = $image_title;

        // create data to the table
        User::create($data);

        return redirect(route('user.index'))->with('success', 'User Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,id,' . $user->id],
            'phone_number' => ['nullable', 'numeric'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,gif', 'max:2048'],
            'password' => ['nullable', 'string', 'min:8'],
        ]);
        // set all data from request to the variable $data
        $data = $request->all();

        // store image 
        $image_title = $user->image;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgpath = 'upload/user/';
            $imgname = now()->format('ymdhis') . rand(10000, 99999) . '.' . $img->getClientOriginalExtension();
            $img->move($imgpath, $imgname);
            $image_title = $imgpath . $imgname;
        }

        // set image name 
        $data['image'] = $image_title;

        // check password is null or not
        if ($data['password'] == null) {
            $data['password'] = $user->password;
        }

        // create data to the table
        $user->update($data);

        return redirect(route('user.index'))->with('success', 'User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'User Deleted Successfully!');
    }
}
