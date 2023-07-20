<x-app-layout>

    <x-slot name="header">Menü Ekle</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Menü Ekle
            </h5>
            <hr>
            <form action="{{route('menu-category.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="">Üst Menü Adı :</label>
                    <input type="text" name="name" value="{{old('name')}}" placeholder="Menü Adı " id="name" class="form-control">
                </div>
                

                <div class="form-group">
                    <button class="btn btn-success form-control"><i class="fa fa-plus"></i> EKLE</button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
