<x-app-layout>

    <x-slot name="header">Ayarlar</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Ayarları Güncelle
            </h5>
            <hr>
            <form method="POST" action="{{route('setting.update',$setting->id)}}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="">Site Başlığı :</label>
                    <input type="text" name="title" value="{{ old('title',$setting->title) }}" id="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Site Açıklaması :</label>
                    <input type="text" name="description" value="{{ old('description',$setting->description) }}" id="description" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Site Anahtar Kelime :</label>
                    <input type="text" name="seo_key" value="{{ old('seo_key',$setting->seo_key) }}" id="seo_key" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Telefon :</label>
                    <input type="text" name="phone" value="{{ old('phone',$setting->phone) }}" id="phone" class="form-control">
                </div>


                <div class="form-group">
                    <label for="">GSM :</label>
                    <input type="text" name="mobile" value="{{ old('mobile',$setting->mobile) }}" id="mobile" class="form-control">
                </div>


                <div class="form-group">
                    <label for="">Mail :</label>
                    <input type="mail" name="mail" value="{{ old('mail',$setting->mail) }}" id="mail" class="form-control">
                </div>


                <div class="form-group">
                    <label for="">Adres :</label>
                    <textarea name="address" id="address" cols="30" rows="10" class="form-control">{{ old('address',$setting->address) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Banner Durum :</label>
                    <select name="banner_enable" id="banner_enable" class="form-control">
                        <option value="1" @if($setting->banner_enable == 1) {{ 'selected' }}  @endif>AKTİF</option>
                        <option value="0" @if($setting->banner_enable == 0) {{ 'selected' }}  @endif>PASİF</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="">Banner Text :</label>
                    <input type="text" name="banner_text" id="banner_text" class="form-control" value="{{ old('banner_text',$setting->banner_text) }}">
                </div>

                <div class="form-group">
                <label for="">Banner Link :</label>
                <input type="text" class="form-control" id="banner_link" name="banner_link" value="{{ old('banner_link',$setting->banner_link) }}">
                </div>

                <div class="form-group">
                    <label for="">Facebook :</label>
                    <input type="text" name="social_facebook" id="social_facebook" class="form-control" value="{{ old('social_facebook',$setting->social_facebook) }}">
                </div>


                <div class="form-group">
                    <label for="">İnstagram :</label>
                    <input type="text" name="social_instagram" id="social_instagram" class="form-control" value="{{ old('social_instagram',$setting->social_instagram) }}">
                </div>


                <div class="form-group">
                    <label for="">Twitter :</label>
                    <input type="text" name="social_twitter" id="social_twitter" class="form-control" value="{{ old('social_twitter',$setting->social_twitter) }}">
                </div>

                <div class="form-group">
                    <label for="">Youtube :</label>
                    <input type="text" name="social_youtube" id="social_youtube" class="form-control" value="{{ old('social_youtube',$setting->social_youtube) }}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success form-control"><i class="fa fa-pen"></i> GÜNCELLE</button>
                </div>

            </form>
        </div>
    </div>


</x-app-layout>