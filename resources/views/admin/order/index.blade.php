<x-app-layout>

    <x-slot name="header">SİPARİŞLER </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <div class="btn-group">
{{--                    <a href="{{ route('basecategory.create') }}" class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> ÜST KATEGORİ EKLE</a>--}}
{{--                    &nbsp;<a href="{{ route('category.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> ALT KATEGORİ EKLE</a>--}}

                </div>
            </h5>
            <div class="table-responsive">
                    <table class="table table-hover ">
                <thead>
                <tr>
                    <th>Sipariş Kodu</th>
                    <th>Müşteri</th>
                    <th>Tutar</th>
                    <th>Ödeme Kanalı</th>
                    <th>Durum</th>
                    <th>Sipariş Tarihi</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th scope="row">#{{ $order->order_code }}</th>
                        <td>{{ $order->shopping_cart->user->name }}</td>
                        <td>{{ round($order->order_price ,2) }} TL</td>
                        <td>{{ $order->bank }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at->diffForHumans() }}</td>
                        <td style="width: 100px;">
                            <div class="btn-group">
                                <a href="{{ route('order.print',$order->id) }}" target="_blank" class="btn btn-sm btn-dark"><i class="fa fa-print"></i></a>
                                &nbsp;
                                <a href="{{ route('order.edit',$order->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                &nbsp;
                                <form method="POST" action="{{route('order.destroy',$order->id)}}">
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
            </div>
            {{ $orders->links() }}
        </div>
    </div>
</x-app-layout>
