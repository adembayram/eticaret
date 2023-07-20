<x-app-layout>

    <x-slot name="header"> KATEGORİLER </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <div class="btn-group">
                    <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> KATEGORİ EKLE</a>
                    &nbsp;<a href="{{ route('basecategory.create') }}" class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> ÜST KATEGORİ EKLE</a>
                </div>
            </h5>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Üst Kategori</th>
                    <th>Slug</th>
                    <th>Kategori Adı</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorys as $category)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td> {{ $category->base_category->name }} </td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->name }}</td>
                    <td style="width: 100px;">
                        <div class="btn-group">
                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            &nbsp;
                        <form method="POST" action="{{route('category.destroy',$category->id)}}">
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
            {{ $categorys->links() }}
        </div>
    </div>
</x-app-layout>
