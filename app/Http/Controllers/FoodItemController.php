<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\FoodItem;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FoodItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foodItems = FoodItem::all();
        return view('admin.pages.foodItem.index', compact('foodItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = categories::all();
        return view('admin.pages.foodItem.create', compact('categories'));
    }
    public function getFoodData()
    {

        $foodItems = FoodItem::with('categories')->select('id', 'food_name', 'food_price', 'description', 'image', 'availability_status', 'category_id')->get();

        return DataTables::of($foodItems)

            ->addColumn('image', function ($foodItem) {
                $imageUrl = asset($foodItem->image);
                return '<img src="' . $imageUrl . '" alt="Food Image" height="45px" width="50px">';
            })
            ->addColumn('category_id', function ($foodItem) {
                return $foodItem->categories ? $foodItem->categories->name : 'NaN';
            })

            ->addColumn('action', function ($foodItem) {
                return '<div class="d-flex">
                    <a class="btn btn-primary mr-2"  href="' . route('food.edit', ['food' => $foodItem->id]) . '" id="' . $foodItem->id . '"><i class="bi bi-pencil-square"></i></a>
                    <form action="' . route('food.destroy', ['food' => $foodItem->id]) . '" method="post" id="' . $foodItem->id . '">
                        ' . csrf_field() . '
                        ' . method_field('delete') . '
                        <button type="submit" class="btn btn-danger"><i class="bi bi-backspace-reverse-fill"></i></button>
                    </form>
            
                </div>';
            })
            ->rawColumns(['image', 'category_id', 'action'])
            ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {

    //     $request->validate([
    //         'food_name' => ['required', 'string', 'max:255'],
    //         'food_price' => ['required', 'numeric'],
    //         'description' => ['required', 'string'],
    //         'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,gif', 'max:2048'],
    //         'category_id' => ['required', 'exists:categories,id'],
    //     ]);
    //     // set all data from request to the variable $data
    //     $data = $request->all();

    //     // store image 
    //     $image_title = null;
    //     if ($request->hasFile('image')) {
    //         $img = $request->file('image');
    //         $imgpath = 'upload/user/';
    //         $imgname = now()->format('ymdhis') . rand(10000, 99999) . '.' . $img->getClientOriginalExtension();
    //         $img->move($imgpath, $imgname);
    //         $image_title = $imgpath . $imgname;
    //     }

    //     // set image name 
    //     $data['image'] = $image_title;

    //     // create data to the table
    //     FoodItem::create($data);
    //     return redirect(route('food.index'))->with('success', 'Item Successfully Added!');
    // }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'food_name' => ['required', 'string', 'max:255'],
            'food_price' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,gif', 'max:2048'],
            'category_id' => ['required', 'exists:categories,id'],
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
        FoodItem::create($data);

        return redirect(route('food.index'))->with('success', 'Food Item Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodItem $foodItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = categories::all();
        $foodItems = FoodItem::findOrFail($id);
        return view('admin.pages.foodItem.edit', compact('foodItems', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $foodItems = FoodItem::findOrFail($id);
        $request->validate([
            'food_name' => ['required', 'string', 'max:255'],
            'food_price' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,gif', 'max:2048'],
            'category_id' => ['required', 'exists:categories,id'],
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
        $foodItems->update($data);
        return redirect(route('food.index'))->with('success', 'Food Item Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $foodItem = FoodItem::findOrFail($id);
        $foodItem->delete();
        return back()->with('success', 'Item Deleted Successfully!');
    }
}
