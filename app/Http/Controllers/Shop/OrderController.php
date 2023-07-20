<?php 


namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Http\Requests\Frontend\OrderPaymentRequest;
use App\Models\ShoppingCartProduct;
use Illuminate\Http\Request;
use ShoppingCart;

/**
 * 
 */
class OrderController extends Controller
{
	


	public function orderPost(OrderPaymentRequest $request){

		$order_code = rand(10000000,99999999);

		$priceTotalCard = ShoppingCart::total();



		if($request->payment == 'paytr'){



			if($priceTotalCard >= 200){

				$cargoPrice = 0;

			}else{

				$cargoPrice = config('cart.cargo_price');
			}



			$user = User::where('id',auth()->id())->first();


			$merchant_id 	= '';
			$merchant_key 	= '';
			$merchant_salt	= '';

			$email = $user->email;

			$payment_amount	= round(ShoppingCart::total()+$cargoPrice,2) * 100; 

			$merchant_oid = $order_code;

			$user_name = $request->firstname . " ". $request->lastname;

			$user_address = $request->address." ".$request->county." / ".$request->city;

			$user_phone = $request->mobile;

			$merchant_ok_url = route('shop.order.payment.success');

			$merchant_fail_url = route('shop.order.payment.error');



			$basket = array();

			foreach(ShoppingCart::all() as $productCartItem){

				$basket = [$productCartItem->name, round($productCartItem->price,2), $productCartItem->qty];

			}		

			$user_basket = base64_encode(json_encode(array($basket)));

			if( isset( $_SERVER["HTTP_CLIENT_IP"] ) ) {
				$ip = $_SERVER["HTTP_CLIENT_IP"];
			} elseif( isset( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
				$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			} else {
				$ip = $_SERVER["REMOTE_ADDR"];
			}


			$user_ip=$ip;

			$timeout_limit = "30";


			$debug_on = 0;

    ## Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir.
			$test_mode = 0;
			$no_installment	= 0; 	
			$max_installment = 0;

			$currency = "TL";


			$hash_str = $merchant_id .$user_ip .$merchant_oid .$email .$payment_amount .$user_basket.$no_installment.$max_installment.$currency.$test_mode;
			$paytr_token=base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));
			$post_vals=array(
				'merchant_id'=>$merchant_id,
				'user_ip'=>$user_ip,
				'merchant_oid'=>$merchant_oid,
				'email'=>$email,
				'payment_amount'=>$payment_amount,
				'paytr_token'=>$paytr_token,
				'user_basket'=>$user_basket,
				'debug_on'=>$debug_on,
				'no_installment'=>$no_installment,
				'max_installment'=>$max_installment,
				'user_name'=>$user_name,
				'user_address'=>$user_address,
				'user_phone'=>$user_phone,
				'merchant_ok_url'=>$merchant_ok_url,
				'merchant_fail_url'=>$merchant_fail_url,
				'timeout_limit'=>$timeout_limit,
				'currency'=>$currency,
				'test_mode'=>$test_mode
			);

			$ch=curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1) ;
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
			curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
			curl_setopt($ch, CURLOPT_TIMEOUT, 20);	


			$result = @curl_exec($ch);

			if(curl_errno($ch))
				die("PAYTR IFRAME connection error. err:".curl_error($ch));

			curl_close($ch);

			$result=json_decode($result,1);

			if($result['status']=='success'){

				$token=$result['token'];

				$order = Order::create([

					'order_code' => $merchant_oid,
					'shoppingcart_id' => session('active_cart_id'),
					'order_price' => round(ShoppingCart::total()+$cargoPrice,2),
					'status' => "Ödeme Bekleniyor.",
					'name' => $user_name,
					'address' => $user_address,
					'phone' => $request->phone,
					'mobile' => $request->mobile,
					'installment' => 1,
					'bank' => "PAYTR"
				]);

			}
			else{

				die("PAYTR IFRAME failed. reason:".$result['reason']);
			}
	#########################################################################

			echo '<script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
			<iframe src="https://www.paytr.com/odeme/guvenli/'.$token.'" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
			<script>iFrameResize({},"#paytriframe");</script>';

		}elseif($request->payment == 0){


			if($priceTotalCard >= 200){

				$cargoPrice = 0;

			}else{

				$cargoPrice = config('cart.cargo_price') +5;
			}



			$order = Order::create([

				'order_code' => $order_code,
				'shoppingcart_id' => session('active_cart_id'),
				'order_price' => round(ShoppingCart::total()+$cargoPrice,2),
				'status' => 'Siparişiniz Alındı',
				'name' => $request->firstname . " ". $request->lastname,
				'address' => $request->address." ".$request->county." / ".$request->city,
				'phone' => $request->phone,
				'mobile' => $request->mobile,
				'installment' => 1,
				'bank' => "KAPIDA ÖDEME"
			]);

			if($order)
				return redirect()->route('shop.order.payment.success');
			else
				return redirect()->route('shop.order.payment.error');


		}





	}


	public function orderSuccess(){
		
		ShoppingCart::destroy();
		session()->forget('active_cart_id');

		$apiToken = "";

		$data2 = array(
			'chat_id' => '',
			'text' => "Yeni Bir Sipariş Geldi. Lütfen Kontrol Ediniz. :)"
		);

		$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data2) );

		
		return redirect()->route('shop.user.profile.index')->withSuccess("Siparişiniz Alındı. Siparişiniz ile ilgili detaylara profilinizden ulaşabilirsiniz.");

	}


	public function orderError(){

		echo "hata";

	}

	public function paytrCalback(Request $request){


		$merchant_key 	= '';
		$merchant_salt	= '';

		$hash = base64_encode( hash_hmac('sha256', $request->merchant_oid.$merchant_salt.$request->status.$request->total_amount, $merchant_key, true) );

		if( $hash != $request->hash )
			die('PAYTR notification failed: bad hash');


		if( $request->status == 'success' ) { 

			$orderUpdate = Order::where('order_code',$request->merchant_oid)->update([
				'status' => 'Siparişiniz Alındı'
			]);		

			if($orderUpdate){

				return "OK";
			}
			else{
				return "NO";
			}

		} else { 

			return "NO";

		}


		


	}


}