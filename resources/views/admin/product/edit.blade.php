<x-app-layout>

    <x-slot name="header">Ürün Ekle</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Ürün Ekle
            </h5>
            <hr>
            <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="">Ürün Kodu :</label>
                    <input type="text" name="product_code"  class="form-control" id="product_code" value="{{old('product_code',$product->product_code)}}">
                </div>
                <div class="form-group">
                    <label for="">Ürün Adı :</label>
                    <input type="text" name="product_name" value="{{old('product_name',$product->product_name)}}" placeholder="Ürün Adı " id="product_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Slug :</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug',$product->slug) }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Açıklama :</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description',$product->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Birim :</label>
                    <select name="bodies[]" id="bodies" multiple class="form-control">
                        <option value="">Lütfen Seçim Yapınız</option>
                        @foreach($bodies as $key => $size)
                            <option value="{{ $size }}" {{in_array($size, old("bodies") ?: []) ? "selected": ""}}>{{ $size }}</option>
                        @endforeach

                        @foreach($product_size as $bodies)
                            <option value="{{$bodies->size}}" selected hidden>{{ $bodies->size }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Renk :</label>
                    <select name="color[]" id="color" multiple class="form-control">
                        <option value="">Lütfen Seçim Yapınız</option>
                        @foreach(config('product.color') as $key => $color)
                            <option value="{{$key."-".$color}}">{{ $key }}</option>
                        @endforeach

                        @foreach($product_color as $color)
                            <option value="{{$color->color."-".$color->color_code}}">{{ $color->color }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Adet :</label>
                    <input type="text" class="form-control" name="stock" id="stock" value="{{old('stock',$product->stock)}}">
                </div>

                <div class="form-group">
                    <label for="">Fiyat :</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{old('price',$product->price)}}">
                </div>

                <div class="form-group">
                    <label for="">İNDİRİM (%) :</label>
                    <input type="text" class="form-control" name="discount" id="discount" value="{{old('discount',$product->discount)}}">
                </div>

                <div class="form-group">
                    <label for="">Kategoriler :</label>
                    <select name="category[]" id="category" multiple class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ collect(old('category',$productCategories))->contains($category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="">Gösteri Resmi :</label><br>
                    <input type="file" name="product_image" id="product_image">
                </div>

                <div class="form-group">
                    <label class="form-label" for="">Gösteri Resmi (2):</label><br>
                    <input type="file" name="product_image_to" id="product_image_to">
                </div>
                <div class="form-group">
                    <label for="">Ürün Resimleri :</label><br>
                    <input  type="file" name="file[]" id="file[]" multiple>
                </div>

                <div class="form-group">
                    <label for="">Gösterim Ayarları :</label>

                    <div>
                        <input type="checkbox" value="1" name="enable_slider" id="enable_slider" {{ old('enable_slider',$product->productDetail->enable_slider) ? 'checked' : '' }} >
                        <label for="enable_slider">Slider'da Göster</label>
                    </div>
                    <div>
                        <input type="checkbox" value="1" name="enable_opportunity" id="enable_opportunity" {{ old('enable_opportunity',$product->productDetail->enable_opportunity) ? 'checked' : '' }} >
                        <label for="enable_opportunity">Günün Fırsatında Göster</label>

                    </div>

                    <div>
                        <input type="checkbox" value="1" name="enable_featured" id="enable_featured" {{ old('enable_featured',$product->productDetail->enable_featured) ? 'checked' : '' }} >
                        <label for="enable_featured">Öne Çıkan Alanında Göster</label>

                    </div>

                    <div >
                        <input type="checkbox" value="1" name="enable_bestseller" id="enable_bestseller" {{ old('enable_bestseller',$product->productDetail->enable_bestseller) ? 'checked' : '' }} >
                        <label for="enable_bestseller">Çok Satan Ürünlerde Göster</label>

                    </div>
                    <div>
                        <input type="checkbox" value="1" name="enable_discounted" id="enable_discounted" {{ old('enable_discounted',$product->productDetail->enable_discounted) ? 'checked' : '' }} >
                        <label for="enable_discounted">İndirimli Ürünlerde Göster</label>

                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-success form-control"><i class="fa fa-plus"></i> EKLE</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="js">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#category').select2({
                    placeholder: ' Lütfen kategori seçiniz'
                });

                $('#bodies').select2({
                    placeholder: ' Lütfen Beden Seçiniz'
                });

                $('#color').select2({
                    placeholder: ' Lütfen Renk Seçiniz'
                });

            });
        </script>
    </x-slot>

    <x-slot name="css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

    </x-slot>

</x-app-layout>
