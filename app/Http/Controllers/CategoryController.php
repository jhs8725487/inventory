<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('users.categories', compact('categories'));

    }
    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        // Create a new category instance
        $category = new Category();
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];

        // Save the category in the database
        $category->save();

        return redirect()->route('category.index')->with('success', 'User registered successfully!');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        // You can pass the $category data to the view and handle the edit logic here
        return view('users.edit-category', ['category' => $category]);
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Update the category data
        $category->name = $validatedData['name'];
        $category->description = $validatedData['description'];

        // Save the updated category
        $category->save();

        // Redirect to a success page or wherever you want
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }



    
}
