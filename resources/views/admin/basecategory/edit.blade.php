<x-app-layout>

    <x-slot name="header">Üst Kategori Ekle</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Üst Kategori Güncelle
            </h5>
            <hr>
            <form action="{{route('basecategory.update',$base->id)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="">Üst Kategori Adı :</label>
                    <input type="text" name="base_name" value="@if(old('base_name')) {{old('base_name')}} @elseif($base->name){{ $base->name }} @endif" placeholder="Üst Kategori Adı " id="base_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Slug :</label>
                    <input type="text" name="base_slug" id="base_slug" value="@if(old('base_slug')) {{old('base_slug')}} @elseif($base->slug){{ $base->slug }} @endif" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Üst Menu :</label>
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="">Lütfen Seçim Yapınız..</option>
                        @foreach($menus as $menu)
                        @if($menu->id == $base->menu_id)
                        <option value="{{ $menu->id }}" selected hidden>{{ $menu->name }}</option>
                        @endif
                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <button class="btn btn-success form-control"><i class="fa fa-plus"></i> GÜNCELLE</button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
