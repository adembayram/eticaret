<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Bodies;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\UnitMeasure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate(5);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::get();

        $bodies = [
            'XS',
            'S',
            'M',
            'L',
            'XL',
            'XXL',
            'STD'


        ];

        return view('admin.product.create', compact('categories','bodies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        //
        //return dd($request);
        if ($request->hasFile('product_image') and $request->hasFile('product_image_to')) {

            $fileName = $request->product_name . "_" . date("YmdHis") . "." . $request->product_image->getClientOriginalextension();
            $fileNameWithUpload = 'uploads/images/products/' . $fileName;
            $request->product_image->move(public_path('uploads/images/products'), $fileName);
            $request->product_image = $fileNameWithUpload;

            $fileName1 = $request->product_name . "_to_" . date("YmdHis") . "." . $request->product_image_to->getClientOriginalextension();
            $fileNameWithUpload1 = 'uploads/images/products/' . $fileName1;
            $request->product_image_to->move(public_path('uploads/images/products'), $fileName1);
            $request->product_image_to = $fileNameWithUpload1;

        }


        if (isset($request->slug)) {
            $slug = $request->slug;
        } else {
            $slug = Str::slug($request->product_name);
        }

        $product = Product::create([
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'slug' => $slug,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'discount' => $request->discount
        ]);

        $product_detail = ProductDetail::create([

            'product_id' => $product->id,
            'product_image' => $request->product_image,
            'product_image_to' => $request->product_image_to,
            'enable_slider' => $request->enable_slider == null ? $request->enable_slider = 0 : $request->enable_slider,
            'enable_opportunity' => $request->enable_opportunity == null ? $request->enable_opportunity = 0 : $request->enable_opportunity,
            'enable_featured' => $request->enable_featured == null ? $request->enable_featured = 0 : $request->enable_featured,
            'enable_bestseller' => $request->enable_bestseller == null ? $request->enable_bestseller = 0 : $request->enable_bestseller,
            'enable_discounted' => $request->enable_discounted == null ? $request->enable_discounted = 0 : $request->enable_discounted

        ]);

        foreach ($request->bodies as $bodies) {

            $bodies = Bodies::create([
                'product_id' => $product->id,
                'size' => $bodies
            ]);

        }

        //$product_image = ProductImage::insert();
        if ($request->hasFile('file')) {
            $i = 0;
            foreach ($request->file as $file) {

                $detail_fileName = $request->product_name . "_". $i++ ."_". date("YmdHis") . "." . $file->getClientOriginalextension();
                $detail_fileNameWithUpload = 'uploads/images/product/' . $detail_fileName;
                $fileUpload = $file->move(public_path('uploads/images/product'), $detail_fileName);
                $file = $detail_fileNameWithUpload;
                if ($fileUpload) {

                    $productImage_insert = ProductImage::create([
                        'image' => $file,
                        'detail_id' => $product_detail->id
                    ]);

                }

            }

         //dd($request->file);

        }

        foreach ($request->category as $category) {
            $category_product = CategoryProduct::create([
                'product_id' => $product->id,
                'category_id' => $category
            ]);
        }

        foreach ($request->color as $color){

            $color_exp = explode("-",$color);
            $product_color = Color::create([
                'product_id' => $product->id,
                'color' => $color_exp[0],
                'color_code' => $color_exp[1]
            ]);

        }

        return redirect()->route('product.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id) ?? abort(404, 'Urun Bulunamadı');
        $categories = Category::get();


        $bodies = [
            'XS',
            'S',
            'M',
            'L',
            'XL',
            'XXL',
            'STD'

        ];

        //$product_size = Bodies::where('product_id',$id)->get();
        $product_size = $product->bodies->all();
        $product_color = $product->colors->all();

        //$product_size = Bodies::where('product_id',$product->id)->get();

        $productCategories = $product->productCategories()->pluck('category_id')->all();

        return view('admin.product.edit', compact(['product', 'categories', 'productCategories','bodies','product_size','product_color']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        //

        $product = Product::find($id) ?? abort(404, 'Ürün Bulunamadı.');
        $productDetail = ProductDetail::where('product_id', $id) ?? abort(404, "Ürün Bulunmadı.");
        //$productImage = ProductImage::where('detail_id',$productDetail->id);

        $slug = Str::slug($request->product_name);


        $productUpdate = $product->update([

            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'slug' => $slug,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'discount' => $request->discount,

        ]);

        if ($request->hasFile('product_image')) {

            $fileName = $request->product_name . "_" . date("YmdHis") . "." . $request->product_image->getClientOriginalextension();
            $fileNameWithUpload = 'uploads/images/products/' . $fileName;
            $request->product_image->move(public_path('uploads/images/products/'), $fileName);
            $request->product_image = $fileNameWithUpload;

            $fileName1 = $request->product_name . "_to_" . date("YmdHis") . "." . $request->product_image_to->getClientOriginalextension();
            $fileNameWithUpload2 = 'uploads/images/products/' . $fileName1;
            $request->product_image_to->move(public_path('uploads/images/products/'), $fileName1);
            $request->product_image_to = $fileNameWithUpload2;

            $productDetailUpdate = $productDetail->update([

                'product_image' => $request->product_image,
                'product_image_to' => $request->product_image_to,
                'enable_slider' => $request->enable_slider == null ? $request->enable_slider = 0 : $request->enable_slider,
                'enable_opportunity' => $request->enable_opportunity == null ? $request->enable_opportunity = 0 : $request->enable_opportunity,
                'enable_featured' => $request->enable_featured == null ? $request->enable_featured = 0 : $request->enable_featured,
                'enable_bestseller' => $request->enable_bestseller == null ? $request->enable_bestseller = 0 : $request->enable_bestseller,
                'enable_discounted' => $request->enable_discounted == null ? $request->enable_discounted = 0 : $request->enable_discounted

            ]);

        } else {

            $productDetailUpdate = $productDetail->update([


                'enable_slider' => $request->enable_slider == null ? $request->enable_slider = 0 : $request->enable_slider,
                'enable_opportunity' => $request->enable_opportunity == null ? $request->enable_opportunity = 0 : $request->enable_opportunity,
                'enable_featured' => $request->enable_featured == null ? $request->enable_featured = 0 : $request->enable_featured,
                'enable_bestseller' => $request->enable_bestseller == null ? $request->enable_bestseller = 0 : $request->enable_bestseller,
                'enable_discounted' => $request->enable_discounted == null ? $request->enable_discounted = 0 : $request->enable_discounted

            ]);

        }

        $productCategory = CategoryProduct::where('product_id', $id)->delete();

        if ($productCategory) {
            foreach ($request->category as $category) {
                $category_product = CategoryProduct::create([
                    'product_id' => $product->id,
                    'category_id' => $category
                ]);
            }
        }

        $bodies_delete = Bodies::where('product_id',$id)->delete();

        if($bodies_delete){

            foreach ($request->bodies as $body_size){

                $bodies_update = Bodies::create([
                    'product_id' => $product->id,
                    'size' => $body_size
                ]);

            }

        }

        $color_delete = Color::where('product_id',$id)->delete();

        if($color_delete){

            foreach ($request->color as $color){
                $color_exp = explode("-",$color);
                $color_update = Color::create([

                    'product_id' => $product->id,
                    'color' => $color_exp[0],
                    'color_code' => $color_exp[1]

                ]);

            }

        }

        return redirect()->route('product.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id) ?? abort(404, 'Ürün Bulunamadı.');
        $product->delete();

        return redirect()->route('product.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');
    }
}
