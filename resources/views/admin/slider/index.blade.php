<x-app-layout>

    <x-slot name="header">SLİDER LİSTESİ </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <div class="btn-group">
                    <a href="{{ route('slider.create') }}" class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> SLİDER EKLE</a>
                </div>
            </h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Resim</th>
                        <th>Başlık</th>
                        <th>Açıklama</th>
                        <th>Link</th>
                        <th>Durum</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset($slider->image) }}" alt="" width="100" height="100"></td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->description }}</td>
                        <td><a href="{{ $slider->link }}" target="_blank"><button type="button" class="btn btn-primary btn-sm">Link</button></a></td>
                        <td>{{ $slider->enable_slider }}</td>
                        <td style="width: 100px;">
                        <div class="btn-group">
                        <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            &nbsp;
                        <form method="POST" action="{{route('slider.destroy',$slider->id)}}">
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
            {{ $sliders->links() }}
        </div>
    </div>
</x-app-layout>