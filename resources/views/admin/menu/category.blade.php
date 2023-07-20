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
    <x-slot name="header">KATEGORİLER </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="bs-glyphicons ">
                <ul class="bs-glyphicons-list">

                    <a href="{{route('menu-category.create')}}">
                        <li style="width: 25%;">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <span class="glyphicon-class">ÜST MENÜ OLUŞTUR</span>
                        </li>
                    </a>


                    <a href="{{route('menu-category.index')}}">
                        <li style="width: 25%;">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <span class="glyphicon-class">ÜST MENÜLER</span>
                        </li>
                    </a>

                    <a href="{{route('basecategory.create')}}">
                        <li style="width: 25%;">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <span class="glyphicon-class">ÜST KATEGORİ OLUŞTUR</span>
                        </li>
                    </a>
                    <a href="{{route('basecategory.index')}}">
                        <li style="width: 25%;">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            <span class="glyphicon-class">ÜST KATEGORİLER</span>
                        </li>
                    </a>

                    <a href="{{route('category.create')}}">
                        <li style="width: 25%;">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                            <span class="glyphicon-class">ALT KATEGORİ OLUŞTUR</span>
                        </li>
                    </a>

                    <a href="{{route('category.index')}}">
                        <li style="width: 25%;">
                            <span class="glyphicon glyphicon-align-center" aria-hidden="true"></span>
                            <span class="glyphicon-class">ALT KATEGORİLER</span>
                        </li>
                    </a>


                </ul>
            </div>


        </div>
    </div>
</div>
</x-app-layout>
