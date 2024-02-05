<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;



class CategoryController extends Controller
{
    function index()
    {
        $category = categories::all();
        return view('admin.pages.category.index', ['categories' => $category]);
    }

    function getdata()
    {
        $category = categories::select('id', 'name');
        return Datatables::of($category)
            ->addColumn('action', function ($category) {
                return '<a href="' . route('admin.deleteCategory', ['id' => $category->id]) . '" class="btn btn-xs btn-danger delete" id="' . $category->id . '"><i class="bi bi-backspace-reverse-fill"></i> Delete</a>';
            })
            ->addColumn('checkbox', '<input type="checkbox" name="category_checkbox[]" class="category_checkbox" value="{{$id}}" />')
            ->rawColumns(['checkbox', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        // set all data from request to the variable $data
        $data = $request->all();

        // create data to the table
        categories::create($data);

        return redirect(route('category'))->with('success', 'Cateogory Created Successfully!');
    }
    public function create()
    {
        $categories = categories::all(); // Fetch all categories from the database
        return view('admin.pages.category.create', compact('categories'));
    }

    public function destroy($id)
    {
        $category = categories::findOrFail($id);
        $category->delete();
        return back()->with('success', 'Category Deleted Successfully!');
    }
}
