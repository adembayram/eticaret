<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderCreateRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sliders = Slider::paginate(10);
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slider.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderCreateRequest $request)
    {
        //
        $fileName = $request->slider_title."_".date("YmdHis").".".$request->slider_image->getClientOriginalextension();
        $fileNameWithUpload = 'uploads/images/slider/'.$fileName;
        $request->slider_image->move(public_path('uploads/images/slider'),$fileName);
        $request->slider_image = $fileNameWithUpload;

            $insert = Slider::create([
                'enable_slider' => $request->enable_slider,
                'image' => $request->slider_image,
                'title' => $request->slider_title,
                'description' => $request->slider_description,
                'link' => $request->slider_link
            ]);

            return redirect()->route('slider.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');
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
        $slider = Slider::find($id) ?? abort(404,'Slider Bulunamadı.');
        return view('admin.slider.edit',compact('slider'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderUpdateRequest $request, $id)
    {
        //

        $slider = Slider::find($id) ?? abort(404,'Slider Bulunamadı.');

        if($request->hasFile('slider_image')){

            $fileName = $request->slider_title."_".date("YmdHis").".".$request->slider_image->getClientOriginalextension();
            $fileNameWithUpload = 'uploads/images/slider/'.$fileName;
            $request->slider_image->move(public_path('uploads/images/slider'),$fileName);
            $request->slider_image = $fileNameWithUpload;
            
            $sliderUpdate = $slider->update([

                'enable_slider' => $request->enable_slider,
                'title' => $request->slider_title,
                'description' => $request->slider_description,
                'link' => $request->slider_link,
                'image' => $request->slider_image

            ]);


        }else{

            $sliderUpdate = $slider->update([

                'enable_slider' => $request->enable_slider,
                'title' => $request->slider_title,
                'description' => $request->slider_description,
                'link' => $request->slider_link               

            ]);

        }

        if($sliderUpdate){
            return redirect()->route('slider.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');
        }

        return redirect()->back()->withErrors('İşlem Gerçekleştirilken Bir Hata İle Karşılaşıldı. Lütfen Tekrar Deneyeniz.');
        
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

        $slider = Slider::find($id) ?? abort(404,'Slider Bulunamadı');
        $sliderDelete = $slider->delete();
        if($sliderDelete){
            return redirect()->route('slider.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');
        }
        
        return redirect()->back()->withErrors('İşlem Gerçekleştirilken Bir Hata İle Karşılaşıldı. Lütfen Tekrar Deneyeniz.');
    }
}
