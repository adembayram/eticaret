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
    <x-slot name="header">SİPARİŞLER </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="bs-glyphicons ">
                <ul class="bs-glyphicons-list">

                    <a href="{{route('order.index')}}">
                        <li style="width: 25%;">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            <span class="glyphicon-class">SİPARİŞLER</span>
                        </li>
                    </a>




                </ul>
            </div>


        </div>
    </div>
    </div>
</x-app-layout>
