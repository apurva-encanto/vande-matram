<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory()
    {
        return view('admin.category.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = new Category();
        $category->name = $input['name'];
        $category->description = $input['description'];
        $category->slug = $this->createSlug($input['name']);
        $category->save();
        return redirect()->route('admin.category.list')->with('success', 'category Added successfully!');


        //
    }

    public function createSlug($string)
    {
        // Generate slug using Str::slug() method
        $slug = Str::slug($string);

        // Check if the generated slug already exists in the database
        // If it does, append a number to the slug to make it unique
        $count = 2;
        while (Category::where('slug', $slug)->exists()) {
            $slug = Str::slug($string) . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function listCategory(Request $request)
    {
        $data['categories'] = Category::where('is_delete', '0')->get();
        return view('admin.category.list', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editCategory(Request $request, $id): View
    {

        $data['category'] = Category::find($id);
        return view('admin.category.edit', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request, $id)
    {

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = $this->createSlug($request->name);
        $category->status = $request->status;
        $category->save();
        return redirect()->route('admin.category.list')->with('success', 'category Updated successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
