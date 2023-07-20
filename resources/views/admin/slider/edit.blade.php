<x-app-layout>

    <x-slot name="header">Slider Güncelle</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Slider Güncelle
            </h5>
            <hr>
            <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Durum :</label>
                    <select name="enable_slider" id="enable_slider" class="form-control">
                        <option value="1" @if($slider->enable_slider == 1) {{ 'selected' }} @endif>AKTİF</option>
                        <option value="0" @if($slider->enable_slider == 0) {{ 'selected' }} @endif>PASİF</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Başlık :</label>
                    <input type="text" name="slider_title" id="slider_title" value="@if(old('slider_title')) {{old('slider_title')}} @elseif($slider->title){{ $slider->title }} @endif" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Açıklama</label>
                    <input type="text" value="@if(old('slider_description')) {{old('slider_description')}} @elseif($slider->description){{ $slider->description }} @endif" name="slider_description" id="slider_description" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Link</label>
                    <input value="@if(old('slider_link')) {{old('slider_link')}} @elseif($slider->link){{ $slider->link }} @endif" type="text" name="slider_link" id="slider_link" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Resim ( 1920x710 )</label><br>
                    <input type="file" name="slider_image" id="slider_image">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary form-control"><i class="fa fa-pen"></i> GÜNCELLE</button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>