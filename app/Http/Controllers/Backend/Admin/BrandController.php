<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\ResponseController as Response;

class BrandController extends Controller
{
    // return all categories
    public function index()
    {
        return Response::successResponse( Brand::latest()->get() );
    }
    // create new category
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:brands|max:255',
        ]);

        $brand = new Brand();
        $brand->name = $request->get('name');
        $brand->slug = Str::slug($request->get('name'));
        $brand->save();
        return Response::successResponse( $brand );
    }
    // return all categories
    public function view($slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        return Response::successResponse( $brand );
    }
    //update category
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'name' => 'required|unique:brands|max:255',
        ]);
        $brand = Brand::where('slug', $slug)->first();
        $brand->name = $request->get('name');
        $brand->save();

        return Response::successResponse($brand);


    }

    //category delete
    public function delete(Request $request, $slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        if( !$brand )
        {
            return Response::errorResponse( ["Data Not found"] );
        }
        else
        {
            $brand->delete();
            return Response::successResponse(Brand::latest()->get());
        }
    }
}
