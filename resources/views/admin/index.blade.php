
<x-app-layout>
<x-slot name="css">

    <style>
        .hero-widget {
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .hero-widget .icon {
            display: block;
            font-size: 96px;
            line-height: 96px;
            margin-bottom: 10px;
            text-align: center;
        }

        .hero-widget var {
            display: block;
            height: 64px;
            font-size: 64px;
            line-height: 64px;
            font-style: normal;
        }

        .hero-widget label {
            font-size: 17px;
        }

        .hero-widget .options {
            margin-top: 10px;
        }

           
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


<x-slot name="home">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="hero-widget well well-sm bg-white" style="background-color: #f2f2f2f2">
                    <div class="icon">
                        <i class="glyphicon glyphicon-signal"></i>
                    </div>
                    <div class="text">
                        <var>{{ $data['pending_order'] }}</var>
                        <label class="text-muted">Bekleyen Sipariş</label>
                    </div>

                </div>
            </div>
            <div class="col-sm-3">
                <div class="hero-widget well well-sm bg-white" style="background-color: #f2f2f2f2">
                    <div class="icon">
                        <i class="glyphicon glyphicon-ok"></i>
                    </div>
                    <div class="text">
                        <var>{{ $data['completed_order'] }}</var>
                        <label class="text-muted">Tamamlanan Sipariş</label>
                    </div>

                </div>
            </div>
            <div class="col-sm-3">
                <div class="hero-widget well well-sm bg-white" style="background-color: #f2f2f2f2">
                    <div class="icon">
                        <i class="glyphicon glyphicon-saved"></i>
                    </div>
                    <div class="text">
                        <var>{{ $data['total_products'] }}</var>
                        <label class="text-muted">Ürün</label>
                    </div>
{{--                    <div class="options">--}}
{{--                        <a href="javascript:;" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-search"></i>--}}
{{--                            View orders</a>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="hero-widget well well-sm bg-white" >
                    <div class="icon">
                        <i class="glyphicon glyphicon-user"></i>
                    </div>
                    <div class="text">
                        <var>{{ $data['total_users'] }}</var>
                        <label class="wid">Kullanıcı</label>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-slot>

   <x-slot name="home2">
<div class="row">
    <div class="col-md-12">
        <div class="">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Çok Satan Ürünler</div>
                            <div class="card-body">
                                <canvas id="chartCokSatan"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Aylara Göre Satışlar</div>
                            <div class="card-body">
                                <canvas id="chartAylaraGoreSatislar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
   </x-slot>

   <x-slot name="link">
   <div class="row">
    <div class="col-md-12">
   <div class="card">
        <div class="card-body">
            <div class="bs-glyphicons ">
                <ul class="bs-glyphicons-list">

                    <a href="{{route('slider.create')}}">
                        <li style="width: 50%;">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <span class="glyphicon-class">SLIDER OLUŞTUR</span>
                        </li>
                    </a>
                    <a href="{{route('slider.index')}}">
                        <li style="width: 50%;">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            <span class="glyphicon-class">SLIDER</span>
                        </li>
                    </a>
                    

                    <a href="{{route('basecategory.create')}}">
                        <li style="width: 50%;">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <span class="glyphicon-class">ÜST KATEGORİ OLUŞTUR</span>
                        </li>
                    </a>
                    <a href="{{route('basecategory.index')}}">
                        <li style="width: 50%;">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            <span class="glyphicon-class">ÜST KATEGORİLER</span>
                        </li>
                    </a>
                  
                    <a href="{{route('category.create')}}">
                        <li style="width: 50%;">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                            <span class="glyphicon-class">ALT KATEGORİ OLUŞTUR</span>
                        </li>
                    </a>

                    <a href="{{route('category.index')}}">
                        <li style="width: 50%;">
                            <span class="glyphicon glyphicon-align-center" aria-hidden="true"></span>
                            <span class="glyphicon-class">ALT KATEGORİLER</span>
                        </li>
                    </a>

                    <a href="{{route('product.create')}}">
                        <li style="width: 50%;">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            <span class="glyphicon-class">ÜRÜN OLUŞTUR</span>
                        </li>
                    </a>
                   
                    <a href="{{route('product.index')}}">
                        <li style="width: 50%;">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            <span class="glyphicon-class">ÜRÜNLER</span>
                        </li>
                    </a>

                    <a href="{{route('order.index')}}">
                        <li style="width: 50%;">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            <span class="glyphicon-class">SİPARİŞLER</span>
                        </li>
                    </a>

                    <a href="{{route('setting.index')}}">
                        <li style="width: 50%;">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            <span class="glyphicon-class">AYARLAR</span>
                        </li>
                    </a>

                 




                </ul>
            </div>


        </div>
    </div>
    </div>
    </div>
    
   </x-slot>

    <x-slot name="js">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
        <script>
                @php
                    $labels = "";
                    $data = "";
                    foreach($multi_selling_products as $rapor) {
                        $labels .= "\"$rapor->product_name\", ";
                        $data .= "$rapor->number, ";
                    }
                @endphp
            var ctx1 = document.getElementById("chartCokSatan").getContext('2d');
            var chartCokSatan = new Chart(ctx1, {
                type: 'horizontalBar',
                data: {
                    labels: [{!! $labels !!}],
                    datasets: [{
                        label: 'Çok Satan Ürünler',
                        data: [{!! $data !!}],
                        borderColor: '#f4645f',
                        borderWidth: 1
                    }]
                },
                options: {
                    legend: {
                        position: 'bottom',
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1
                            }
                        }]
                    }
                }
            });


                    @php
                        $labels = "";
                        $data = "";
                        foreach($sales_by_month as $rapor) {
                            $labels .= "\"$rapor->ay\", ";
                            $data .= "$rapor->number, ";
                        }
                    @endphp
                var ctx2 = document.getElementById("chartAylaraGoreSatislar").getContext('2d');
                var chartAylaraGoreSatislar = new Chart(ctx2, {
                    type: 'line',
                    data: {
                        labels: [{!! $labels !!}],
                        datasets: [{
                            label: 'Aylara Göre Satışlar',
                            data: [{!! $data !!}],
                            borderColor: '#f4645f',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            position: 'bottom'
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    stepSize: 1
                                }
                            }]
                        }
                    }
                });

        </script>
    </x-slot>

    </x-app-layout>
