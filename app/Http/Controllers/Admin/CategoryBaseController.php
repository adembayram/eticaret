<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseCategoryCreateRequest;
use App\Http\Requests\BaseCategoryUpdateRequest;
use App\Models\BaseCategory;
use App\Models\Menu;
use Illuminate\Support\Str;

class CategoryBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bases = BaseCategory::paginate(10);
        return view('admin.basecategory.index',compact('bases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menus = Menu::all();
        return view('admin.basecategory.create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BaseCategoryCreateRequest $request)
    {
        //
        if(isset($request->base_slug)){
            $slug = $request->base_slug;
        }else{
            $slug = Str::slug($request->base_name);
        }

        $insert = BaseCategory::create([
            'name' => $request->base_name,
            'menu_id' => $request->menu_id,
            'slug' => $slug
        ]);


        return redirect()->route('basecategory.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');


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
     $menus = Menu::all();
     $base = BaseCategory::find($id) ?? abort(404,'Kategori Bulunamadı');
     return view('admin.basecategory.edit',compact('base','menus'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BaseCategoryUpdateRequest $request, $id)
    {
        //
        $base_category = BaseCategory::find($id) ?? abort(404,'Kategori Bulunamadı.');
        isset($request->slug) ? $slug = $request->slug : $slug = Str::slug($request->base_name);

        $base_category->where('id',$id)->update([
            'name' => $request->base_name,
            'menu_id' => $request->menu_id,
            'slug' => $slug
        ]);
        return redirect()->route('basecategory.index')->withSuccess("İşlem Başarılı Bir Şekilde Gerçekleştirldi.");
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
        $base = BaseCategory::find($id) ?? abort(404,'Kategori Bulunamadı.');
        $base->delete();
        return redirect()->route('basecategory.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');
    }
}
