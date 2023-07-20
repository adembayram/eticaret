<x-app-layout>

    <x-slot name="header">Kategori Ekle</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Kategori Ekle
            </h5>
            <hr>
            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Üst Kategori :</label>
                    <select name="base_category" id="base_category" class="form-control">
                        <option value="">Lütfen Seçim Yapınız..</option>
                        @foreach($baseCategory as $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Kategori Adı :</label>
                    <input type="text" name="category_name" value="{{old('category_name')}}" placeholder="Kategori Adı " id="category_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Slug :</label>
                    <input type="text" name="category_slug" id="category_slug" class="form-control">
                </div>

                <divc class="form-group">
                    <label for="">Kategori Resmi</label>
                    <input type="file" name="category_image" id="category_image">
        </div>

        <div class="form-group">
            <button class="btn btn-success form-control"><i class="fa fa-plus"></i> EKLE</button>
        </div>
        </form>
    </div>
    </div>


</x-app-layout>