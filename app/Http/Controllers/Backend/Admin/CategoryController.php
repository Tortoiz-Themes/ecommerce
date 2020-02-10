<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\ResponseController as Response;

class CategoryController extends Controller
{
    // return all categories
    public function index()
    {
        return Response::successResponse( Category::latest()->get() );
    }
    // create new category
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = new Category();
        $category->name = $request->get('name');
        $category->slug = Str::slug($request->get('name'));
        $category->save();
        return Response::successResponse( $category );
    }
    // return all categories
    public function view($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return Response::successResponse( $category );
    }
    //update category
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories|max:255',
        ]);
        $category = Category::where('slug', $slug)->first();
        $category->name = $request->get('name');
        $category->save();

        return Response::successResponse($category);


    }

    //category delete
    public function delete(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();
        if( !$category )
        {
            return Response::errorResponse( ["Data Not found"] );
        }
        else
        {
            $category->delete();
            return Response::successResponse(Category::latest()->get());
        }
    }
}
