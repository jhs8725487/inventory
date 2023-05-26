<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{

    public function index()
    {
        $product = DB::select('SELECT p.*, c.name AS category_name FROM products p INNER JOIN categories c ON p.category_id = c.id');

        return view('users.products', compact('product'));
    }



    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('users.edit-product', compact('product', 'categories'));
    }

    
    public function create()
    {
        $categories = Category::all();

        return view('users.register-product', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'category' => 'required|exists:categories,id',
        ]);

        // Create a new product instance
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->stock = $validatedData['stock'];
        $product->price = $validatedData['price'];
        $product->category_id = $validatedData['category'];

        // Save the product in the database
        $product->save();

        // Optionally, you can redirect the user to a specific page
        //return redirect('/products')->with('success', 'Product has been created successfully.');
     
        return redirect()->route('product.index')->with('success', 'User registered successfully!');
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
        'name' => 'required',
        'description' => 'required',
        'category' => 'required|exists:categories,id',
        // Add validation rules for other fields as needed
        ]);

        // Find the product by ID
        $product = Product::find($id);

        // Update the product with the new data
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category');
        // Update other fields as needed

        // Save the updated product
        $product->save();

        // Redirect to a success page or show a success message
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

}
