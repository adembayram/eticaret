<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingUpdateRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = Setting::firstOrFail();
        return view('admin.settings.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingUpdateRequest $request, $id)
    {
        //
        $setting = Setting::find($id) ?? abort(404,'Ayarlar Bulunamadı');

        $settingUpdate = $setting->update([

            'title' => $request->title,
            'description' => $request->description,
            'seo_key' => $request->seo_key,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'mail' => $request->mail,
            'address' => $request->address,
            'banner_enable' => $request->banner_enable,
            'banner_text' => $request->banner_text,
            'banner_link' => $request->banner_link,
            'social_facebook' => $request->social_facebook,
            'social_instagram' => $request->social_instagram,
            'social_twitter' => $request->social_twitter,
            'social_youtube' => $request->social_youtube

        ]);

        if($settingUpdate){
            return redirect()->route('setting.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');
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
    }
}
