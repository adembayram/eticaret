<x-app-layout>

    <x-slot name="header">ÜST KATEGORİLER </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <div class="btn-group">
                    <a href="{{ route('basecategory.create') }}" class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> ÜST KATEGORİ EKLE</a>
                    &nbsp;<a href="{{ route('category.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> ALT KATEGORİ EKLE</a>

                </div>
            </h5>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Alt Kategori Sayısı</th>
                    <th>Slug</th>
                    <th>Kategori Adı</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($bases as $base)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>@if(count($base->category) > 0) {{ count($base->category) }} @else {{ "YOK" }} @endif </td>
                        <td>{{ $base->slug }}</td>
                        <td>{{ $base->name }}</td>
                        <td style="width: 100px;">
                            <div class="btn-group">
                                <a href="{{ route('basecategory.edit',$base->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                &nbsp;
                                <form method="POST" action="{{route('basecategory.destroy',$base->id)}}">
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
            {{ $bases->links() }}
        </div>
    </div>
</x-app-layout>
