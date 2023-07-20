<x-app-layout>

    <x-slot name="header">MENÜLER </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <div class="btn-group">
                    <a href="{{ route('menu-category.create') }}" class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> MENÜ EKLE</a>
                    &nbsp;<a href="{{ route('basecategory.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> ALT KATEGORİ EKLE</a>

                </div>
            </h5>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Alt Kategori Sayısı</th>                    
                    <th>Kategori Adı</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>@if(count($menu->baseCategory) > 0) {{ count($menu->baseCategory) }} @else {{ "YOK" }} @endif </td>                      
                        <td>{{ $menu->name }}</td>
                        <td style="width: 100px;">
                            <div class="btn-group">
                                <a href="{{ route('menu-category.edit',$menu->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                &nbsp;
                                <form method="POST" action="{{route('menu-category.destroy',$menu->id)}}">
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
            {{ $menus->links() }}
        </div>
    </div>
</x-app-layout>
