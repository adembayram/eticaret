<x-app-layout>
    <x-slot name="css">
        <style>
            a {
                color: #343a40;
                text-decoration: none;
            }

            a:hover, a:focus {
                color: #343a40;
                text-decoration: underline;
            }
        </style>
    </x-slot>
    <x-slot name="header">URUNLER </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="bs-glyphicons ">
                <ul class="bs-glyphicons-list">

                    <a href="{{route('product.create')}}">
                        <li style="width: 25%;">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <span class="glyphicon-class">ÜRÜN OLUŞTUR</span>
                        </li>
                    </a>
                    <a href="{{route('product.index')}}">
                        <li style="width: 25%;">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            <span class="glyphicon-class">ÜRÜNLER</span>
                        </li>
                    </a>



                </ul>
            </div>


        </div>
    </div>
    </div>
</x-app-layout>
