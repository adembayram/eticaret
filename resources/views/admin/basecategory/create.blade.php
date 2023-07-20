<x-app-layout>

    <x-slot name="header">Üst Kategori Ekle</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Üst Kategori Ekle
            </h5>
            <hr>
            <form action="{{route('basecategory.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="">Üst Kategori Adı :</label>
                    <input type="text" name="base_name" value="{{old('base_name')}}" placeholder="Üst Kategori Adı " id="base_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Slug :</label>
                    <input type="text" name="base_slug" id="base_slug" value="{{ old('base_slug') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Üst Menü :</label>
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="">Lütfen Seçim Yapınız..</option>
                        @foreach($menus as $menu)
                        <option value="{{$menu->id}}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-success form-control"><i class="fa fa-plus"></i> EKLE</button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
