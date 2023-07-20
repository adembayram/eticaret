<x-app-layout>

    <x-slot name="header">Kategori Ekle</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Kategori Güncelle
            </h5>
            <hr>
            <form method="POST" action="{{route('category.update',$category->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Üst Kategori :</label>
                    <select name="base_category" id="base_category" class="form-control">
                        <option value="">Lütfen Seçim Yapınız..</option>
                        @foreach($baseCategory as $base)
                            @if($base->id == $category->base_id)
                                <option value="{{ $base->id }}" selected hidden>{{ $base->name }}</option>
                            @endif
                            <option value="{{ $base->id }}">{{ $base->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Kategori Adı :</label>
                    <input type="text" name="category_name" value="@if(old('category_name')) {{old('category_name')}} @elseif($category->name){{ $category->name }} @endif" placeholder="Kategori Adı " id="category_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Slug :</label>
                    <input type="text" name="category_slug" id="category_slug" class="form-control" value="@if(old('category_slug')) {{old('category_slug')}} @elseif($category->slug){{ $category->slug }} @endif">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary form-control"><i class="fa fa-pen"></i> GÜNCELLE</button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
