<x-app-layout>

    <x-slot name="header">ÜRÜN LİSTESİ </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <div class="btn-group">
                    <a href="{{ route('product.create') }}" class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> ÜRÜN EKLE</a>
                </div>
            </h5>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Resim</th>
                    <th>Slug</th>
                    <th>Ürün Adı</th>
                    <th>Ürün Kodu</th>
                    <th>Fiyatı</th>
                    <th>Adet</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>@isset($product->productDetail->product_image) <img src="{{ asset($product->productDetail->product_image) }}" alt="" style="width: 50px; height: 50px;"> @endisset</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td style="width: 100px;">
                            <div class="btn-group">
                                <a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                &nbsp;
                                <form method="POST" action="{{route('product.destroy',$product->id)}}">
                                    @CSRF
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
