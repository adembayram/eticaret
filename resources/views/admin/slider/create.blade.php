<x-app-layout>

    <x-slot name="header">Slider Ekle</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Slider Ekle
            </h5>
            <hr>
            <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">Durum :</label>
                    <select name="enable_slider" id="enable_slider" class="form-control">
                        <option value="1" @if(old('enable_slider') == 1) {{ 'selected' }} @endif>AKTİF</option>
                        <option value="0" @if(old('enable_slider') == 0) {{ 'selected' }} @endif >PASİF</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Başlık :</label>
                    <input type="text" name="slider_title" id="slider_title" value="{{ old('slider_title') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Açıklama</label>
                    <input type="text" name="slider_description" id="slider_description" value="{{ old('slider_description') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Link</label>
                    <input type="text" name="slider_link" id="slider_link" value="{{ old('slider_link') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Resim ( 1920x710 )</label><br>
                    <input type="file" name="slider_image" id="slider_image">
                </div>

                <div class="form-group">
                    <button class="btn btn-success form-control"><i class="fa fa-plus"></i> EKLE</button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>