<x-app-layout>

    <x-slot name="header">Menü Güncelle</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
               Menü Güncelle
            </h5>
            <hr>
            <form action="{{route('menu-category.update',$menu->id)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="">Üst Menü Adı :</label>
                    <input type="text" name="name" value="@if(old('name')) {{old('name')}} @elseif($menu->name){{ $menu->name }} @endif" placeholder="Üst Kategori Adı " id="name" class="form-control">
                </div>
                
                <div class="form-group">
                    <button class="btn btn-success form-control"><i class="fa fa-plus"></i> GÜNCELLE</button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
