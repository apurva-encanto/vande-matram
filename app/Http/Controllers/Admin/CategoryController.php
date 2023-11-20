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
        return redirect()->route('admin.category.list')->with('success', 'Category Added successfully!');


        //
    }

    public function createSlug($string)
    {
       // Generate slug using Str::slug() method
        $teluguToEnglishMapping = [
            'అ' => 'a', 'ఆ' => 'aa', 'ఇ' => 'i', 'ఈ' => 'ii', 'ఉ' => 'u',
            'ఊ' => 'uu', 'ఋ' => 'ru', 'ౠ' => 'rū', 'ఎ' => 'e', 'ఏ' => 'ee',
            'ఐ' => 'ai', 'ఒ' => 'o', 'ఓ' => 'oo', 'ఔ' => 'au', 'ం' => 'm',
            'ః' => 'h', 'క' => 'ka', 'ఖ' => 'kha', 'గ' => 'ga', 'ఘ' => 'gha',
            'ఙ' => 'ṅa', 'చ' => 'ca', 'ఛ' => 'cha', 'జ' => 'ja', 'ఝ' => 'jha',
            'ఞ' => 'ña', 'ట' => 'ṭa', 'ఠ' => 'ṭha', 'డ' => 'ḍa', 'ఢ' => 'ḍha',
            'ణ' => 'ṇa', 'త' => 'ta', 'థ' => 'tha', 'ద' => 'da', 'ధ' => 'dha',
            'న' => 'na', 'ప' => 'pa', 'ఫ' => 'pha', 'బ' => 'ba', 'భ' => 'bha',
            'మ' => 'ma', 'య' => 'ya', 'ర' => 'ra', 'ఱ' => 'ṟa', 'ల' => 'la',
            'ళ' => 'ḷa', 'వ' => 'va', 'శ' => 'śa', 'ష' => 'ṣa', 'స' => 'sa',
            'హ' => 'ha', '్' => '', 'ొ' => 'o', 'ో' => 'oo', 'ౌ' => 'au'
        ];

        // Transliterate Telugu text to English using the mapping
        $englishText = strtr($string, $teluguToEnglishMapping);

        // Create a URL-friendly slug
        $slug = Str::slug($englishText, '-');

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
        return redirect()->route('admin.category.list')->with('success', 'Category Updated successfully!');
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
    public function deleteCategory($id)
    {

        $category = Category::find($id);
        $category->is_delete = '1';
        $category->save();
        return redirect()->route('admin.category.list')->with('success', 'Category Deleted Successfully');
    }
}
