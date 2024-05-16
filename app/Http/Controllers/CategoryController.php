<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repository\LogRepository;
use App\Http\Requests\CategoriesFormRequest;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth"); 
        view()->share("category_menu", "active");
    }

    public function index()
    {
        $this->authorize("viewAny", Category::class);
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize("create", Category::class);
        $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
        return view('categories.create', compact('categories'));
    }

    public function store(CategoriesFormRequest $request)
    {
        $data = $request->getData();
        $data['slug'] = Str::slug($request->name);
        Category::create($data);
        return redirect()->route('categories.index')->with('success', 'Category was successfully added.');
    }

    public function edit(Category $category)
    {
        $this->authorize("update", Category::class);
        $categories = Category::where('parent_id', null)->where('id', '!=', $category->id)->orderby('name', 'asc')->get();
        return view('categories.edit', compact('category','categories'));
    }

    public function update(Category $category, CategoriesFormRequest $request)
    {
        $this->authorize("update", Category::class);
        $data = $request->getData();
        $data['slug'] = Str::slug($request->name);
        $category->update($data);
        LogRepository::instance()->create("category-updated", "{$category->title} categories updated successfuly!");
        return redirect()->route('categories.index')->with('success', 'Category was successfully updated.');
    }

    public function destroy($id)
    {
        try {
            $this->authorize("delete", Category::class);
            $category = Category::findOrFail($id);
            if(count($category->subcategory))
            {
                $subcategories = $category->subcategory;
                foreach($subcategories as $cat)
                {
                    $cat = Category::findOrFail($cat->id);
                    $cat->parent_id = null;
                    $cat->save();
                }
            }
            $category->delete();
            return redirect()->back()->with('delete', 'Category has been deleted successfully.');
        } catch (\Exception $exception) {
            return redirect()->route('roles.index')->with('error', 'Something Went Wrong.');
        }
    }
}
