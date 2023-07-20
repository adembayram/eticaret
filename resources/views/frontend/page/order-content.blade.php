<!doctype html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>Ürün Makbuzu</title>
  </head>
  <style type="text/css">
  
  
  .kare {
   width: 15px; 
   height: 15px; 
   border-style: solid;
   align-items: center;
 }



 body {
  margin: 0;
  padding: 0;
  background-color: #FAFAFA;
  font: 10pt "Tahoma";
}

* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.baslik {
  position: relative;
  text-align: center;
}

.baslik hr {
  position: absolute;
  top: 1px;
  left: 0;
  right: 0;
}

.baslik .yazi {
  background: #fff;
  padding: 0 10px;
  position: relative;
  z-index: 1;
  font-size: 18px;


}

.page {
  width: 21cm;
  min-height: 29.7cm;
  padding: 1cm;
  margin: 1cm auto;
  border: 0px #D3D3D3 solid;
  border-radius: 1px;
  background: white;
  background-repeat:no-repeat;
  background-size: cover;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.subpage {
  padding: 1cm;
  border: 5px red solid;
  height: 256mm;
  outline: 2cm #FFEAEA solid;
}

@page {
  size: A4;
  margin: 0;
}

@media print {
  .page {
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;

  }



}
.kare{
  width: 5cm;
  height: 1.5cm;
}
.sozlesme{
  background-image: url("img/e.jpg");
  width: 19cm;
  height: 27cm;
  background-size: cover;
  padding-left: 1cm;
  padding-right: 1cm;



}

table {
  border-collapse: collapse;
  border-color: black;
}




</style>
<body>
  <div style="text-align: center; margin-top: 15px; z-index: 1px;">
    <input align="center" type="button" id="yazdirbutonu" onclick="yazdir('dekont')" value="Sipariş Yazdır" style="background-color: #f78b22;border: none;color: white;padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;margin-left:50px;"/>
  </div>
  <div id="dekont">
    <div class="book">
      <div class="page">
        <div>
          <img src="{{ asset('dist') }}/images/logo.png" alt="" style="width: 200px; height: 50px; ">
        </div>
        <br>
        <hr>        
        <table width="736" height="763" border="0">
          <tr style="font-weight: bold;">
            <td width="375" height="35">Sipariş <strong>( {{ $order->order_code }} )</strong></td>
            <td width="177">Tarih</td>
            <td width="182">{{ $order->created_at }}</td>
          </tr>
          <tr style="font-weight: bold;">
            <td height="29"><p>Teslimat Bilgileri</p></td>
            <td><p>Fatura Bilgileri</p></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="240"><table width="370" height="228" border="1">
              <tr>
                <td width="180"><b> &nbsp;AD SOYAD</b></td>
                <td width="177"> &nbsp;{{ $order->name }}</td>
              </tr>
              <tr>
                <td height="33"><b> &nbsp;ADRES</b></td>
                <td>&nbsp;{{ $order->address }}</td>
              </tr>
              <tr>
                <td style="font-weight: bold;">&nbsp;POSTA KODU</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td style="font-weight: bold;">&nbsp;TEEFON</td>
                <td>&nbsp;{{ $order->mobile }}</td>
              </tr>
              <tr>
                <td style="font-weight: bold;">&nbsp;E-POSTA</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td style="font-weight: bold;">&nbsp;GÖNDERİ BILGILERI</td>
                <td>&nbsp; {{ $order->cargo_name }}</td>
              </tr>
            </table></td>
            <td colspan="2"><table width="340" height="228" border="1">
              <tr>
                <td style="font-weight: bold;" width="145">&nbsp;AD SOYAD</td>
                <td width="177"> &nbsp;{{ $order->name }}</td>
              </tr>
              <tr>
                <td style="font-weight: bold;" height="30">&nbsp;ADRES</td>
                <td>&nbsp;{{ $order->address }}</td>
              </tr>
              <tr>
                <td style="font-weight: bold;">&nbsp;POSTA KODU</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td style="font-weight: bold;">&nbsp;TEEFON</td>
                <td>&nbsp;{{ $order->mobile }}</td>
              </tr>
              <tr>
                <td style="font-weight: bold;" height="42">&nbsp;FATURA ÜNVANI</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td style="font-weight: bold;">&nbsp;VERGİ NO</td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="23" colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3"><table width="713" height="77" border="1">
              <tr>
                <td width="269"><div align="center"><strong>Ödeme Tipi</strong></div></td>
                <td width="163"><div align="center"><strong>Banka</strong></div></td>
                <td width="140"><div align="center"><strong>Tutar</strong></div></td>
                <td width="160"><div align="center"><strong>Taksit</strong></div></td>
                <td width="115"><div align="center"><strong>Kart No</strong></div></td>
                <td width="262"><div align="center"><strong>Durum</strong></div></td>
              </tr>
              <tr style="text-align: center;">
                <td>{{ $order->bank }}</td>
                <td>&nbsp;</td>
                <td>{{ $order->order_price }}</td>
                <td>{{ $order->installment }}</td>
                <td>&nbsp;</td>
                <td>{{ $order->status }}</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="23" colspan="3">&nbsp;</td>
          </tr>
          <tr>
           @php
           $total_price = 0;
           @endphp
           <td height="66" colspan="3"><table width="713" height="76" border="1">
            <tr>       
              <td width="214"><div align="center"><strong>Ürün Resim</strong></div></td>
              <td width="214"><div align="center"><strong>Stok Kodu</strong></div></td>
              <td width="154"><div align="center"><strong>Barkod</strong></div></td>
              <td width="182"><div align="center"><strong>Ürün Adı</strong></div></td>
              <td width="148"><div align="center"><strong>Miktar</strong></div></td>
              <td width="153"><div align="center"><strong>Birim Fiyat</strong></div></td>
              <td width="102"><div align="center"><strong>Toplam</strong></div></td>
            </tr>
            @foreach($order->shopping_cart->shoppingCartProduct as $cartProduct)
            <tr style="text-align: center;"> 
              <td style="width:120px"><a href=""><img style="height: 70px;" src="{{ $cartProduct->product->productDetail->product_image != null ? asset($cartProduct->product->productDetail->product_image) : '' }}" alt=""></a></td>               
              <td>#{{ $cartProduct->product->product_code }}</td>
              <td>&nbsp;</td>
              <td>#{{ $cartProduct->product->product_name }}</td>
              <td>{{ $cartProduct->number }}</td>
              <td>{{ round($cartProduct->price,2) }}</td>
              <td>{{ $cartProduct->number * $cartProduct->price }}</td>
            </tr>
            @php 
            $total_price += $cartProduct->number * $cartProduct->price;
            @endphp
            @endforeach
          </table></td>
        </tr>
        <tr>
          <td height="30" colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td height="137"><table width="373" height="168" border="1">
            <tr>
              <td style="font-weight: bold;" width="223">&nbsp;KAPIDA ÖDEME TUTARI</td>
              <td width="120">{{ $order->bank == 'KAPIDA ÖDEME' ? '5.00' : '0.00'}} TL</td>
            </tr>
            <tr>
              <td style="font-weight: bold;" height="33">&nbsp;KARGO BEDELİ</td>
              <td>{{ round(config('cart.cargo_price'),2) }} TL</td>
            </tr>
            <tr>
              <td style="font-weight: bold;">&nbsp;HEDİYE ÇEKİ İNDİRİMİ</td>
              <td>0.00</td>
            </tr>
            <tr>
              <td style="font-weight: bold;">&nbsp;HEDİYE PAKETİ TUTARI</td>
              <td>0.00</td>
            </tr>
            <tr>
              <td style="font-weight: bold;">&nbsp;BANKA KOMİSYONU</td>
              <td>0.00</td>
            </tr>
          </table></td>
          <td colspan="2"><div align="right">
            <table width="340" height="158" border="1">
              <tr>
                <td style="font-weight: bold;" width="226" height="39">&nbsp;ARA TOPLAM</td>
                <td width="289">{{ $total_price }} TL</td>
              </tr>
              <tr>
                <td style="font-weight: bold;" height="42">&nbsp;KDV TOPLAM</td>
                <td>{{ $total_price * 18 / 100 }} TL </td>
              </tr>
              <tr>
                <td style="font-weight: bold;" height="54">&nbsp;GENEL TOPLAM</td>
                <td>{{ $order->bank == 'KAPIDA ÖDEME' ? $total_price + 15 : $total_price + 10 }} tl</td>
              </tr>
            </table>
          </div></td>
        </tr>
      </table>
    </div>
  </div>
</div>

</body>
</html>

<script type="text/javascript">
 function yazdir(alan)
 {



  var printContents = document.getElementById(alan).innerHTML;
  var originalContents = document.body.innerHTML;


  document.body.innerHTML = printContents;
  document.title = " ";
  window.print();

  document.body.innerHTML = originalContents;

}
</script>