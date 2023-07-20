<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\BaseCategory;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorys = Category::paginate(10);
        return view('admin.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $baseCategory = BaseCategory::get();
        return view('admin.category.create',compact('baseCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        if(isset($request->category_slug)){
            $slug = $request->category_slug;
        }else{
            $slug = Str::slug($request->category_name);
        }

        $insert = Category::create([
            'base_id' => $request->base_category,
            'name' => $request->category_name,
            'slug' => $slug
        ]);


            return redirect()->route('category.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id) ?? abort(404,'Kategori Bulunamadı.');
        $baseCategory = BaseCategory::get();

        return view('admin.category.edit',compact(['category','baseCategory']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        //
        $category = Category::find($id) ?? abort(404,'Kategori Bulunamadı.');
        $base_category = BaseCategory::find($request->base_category) ?? abort(404,'Üst Kategori Bulunamadı');

        if(isset($request->category_slug)){
            $slug = $request->category_slug;
        }else{
            $slug = Str::slug($request->category_name);
        }

        $category->where('id',$id)->update([

            'base_id' => $request->base_category,
            'name' => $request->category_name,
            'slug' => $slug
        ]);


            return redirect()->route('category.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id) ?? abort(404,'Kategori Bulunamadı.');
        $category->delete();
        return redirect()->route('category.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');
    }
}
