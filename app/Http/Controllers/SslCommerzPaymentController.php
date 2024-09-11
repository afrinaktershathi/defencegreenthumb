<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Stock;

class SslCommerzPaymentController extends Controller
{



  public function exampleHostedCheckout()
  {
    $cartDetails = Cart::where('user_id', auth()->user()->id)->with('products')->get();

    $discrticts = '{
            "districts": [
              {
                "id": "1",
                "division_id": "3",
                "name": "Dhaka",
                "bn_name": "ঢাকা",
                "lat": "23.7115253",
                "long": "90.4111451"
              },
              {
                "id": "2",
                "division_id": "3",
                "name": "Faridpur",
                "bn_name": "ফরিদপুর",
                "lat": "23.6070822",
                "long": "89.8429406"
              },
              
              {
                "id": "3",
                "division_id": "3",
                "name": "Gazipur",
                "bn_name": "গাজীপুর",
                "lat": "24.0022858",
                "long": "90.4264283"
              },
          
              {
                "id": "4",
                "division_id": "3",
                "name": "Gopalganj",
                "bn_name": "গোপালগঞ্জ",
                "lat": "23.0050857",
                "long": "89.8266059"
              },
              {
                "id": "5",
                "division_id": "8",
                "name": "Jamalpur",
                "bn_name": "জামালপুর",
                "lat": "24.937533",
                "long": "89.937775"
              },
              {
                "id": "6",
                "division_id": "3",
                "name": "Kishoreganj",
                "bn_name": "কিশোরগঞ্জ",
                "lat": "24.444937",
                "long": "90.776575"
              },
              {
                "id": "7",
                "division_id": "3",
                "name": "Madaripur",
                "bn_name": "মাদারীপুর",
                "lat": "23.164102",
                "long": "90.1896805"
              },
              {
                "id": "8",
                "division_id": "3",
                "name": "Manikganj",
                "bn_name": "মানিকগঞ্জ",
                "lat": "23.8644",
                "long": "90.0047"
              },
              {
                "id": "9",
                "division_id": "3",
                "name": "Munshiganj",
                "bn_name": "মুন্সিগঞ্জ",
                "lat": "23.5422",
                "long": "90.5305"
              },
              {
                "id": "10",
                "division_id": "8",
                "name": "Mymensingh",
                "bn_name": "ময়মনসিংহ",
                "lat": "24.7471",
                "long": "90.4203"
              },
              {
                "id": "11",
                "division_id": "3",
                "name": "Narayanganj",
                "bn_name": "নারায়াণগঞ্জ",
                "lat": "23.63366",
                "long": "90.496482"
              },
              {
                "id": "12",
                "division_id": "3",
                "name": "Narsingdi",
                "bn_name": "নরসিংদী",
                "lat": "23.932233",
                "long": "90.71541"
              },
              {
                "id": "13",
                "division_id": "8",
                "name": "Netrokona",
                "bn_name": "নেত্রকোণা",
                "lat": "24.870955",
                "long": "90.727887"
              },
              {
                "id": "14",
                "division_id": "3",
                "name": "Rajbari",
                "bn_name": "রাজবাড়ি",
                "lat": "23.7574305",
                "long": "89.6444665"
              },
              {
                "id": "15",
                "division_id": "3",
                "name": "Shariatpur",
                "bn_name": "শরীয়তপুর",
                "lat": "23.2423",
                "long": "90.4348"
              },
              {
                "id": "16",
                "division_id": "8",
                "name": "Sherpur",
                "bn_name": "শেরপুর",
                "lat": "25.0204933",
                "long": "90.0152966"
              },
              {
                "id": "17",
                "division_id": "3",
                "name": "Tangail",
                "bn_name": "টাঙ্গাইল",
                "lat": "24.2513",
                "long": "89.9167"
              },
              {
                "id": "18",
                "division_id": "5",
                "name": "Bogura",
                "bn_name": "বগুড়া",
                "lat": "24.8465228",
                "long": "89.377755"
              },
              {
                "id": "19",
                "division_id": "5",
                "name": "Joypurhat",
                "bn_name": "জয়পুরহাট",
                "lat": "25.0968",
                "long": "89.0227"
              },
              {
                "id": "20",
                "division_id": "5",
                "name": "Naogaon",
                "bn_name": "নওগাঁ",
                "lat": "24.7936",
                "long": "88.9318"
              },
              {
                "id": "21",
                "division_id": "5",
                "name": "Natore",
                "bn_name": "নাটোর",
                "lat": "24.420556",
                "long": "89.000282"
              },
              {
                "id": "22",
                "division_id": "5",
                "name": "Nawabganj",
                "bn_name": "নবাবগঞ্জ",
                "lat": "24.5965034",
                "long": "88.2775122"
              },
              {
                "id": "23",
                "division_id": "5",
                "name": "Pabna",
                "bn_name": "পাবনা",
                "lat": "23.998524",
                "long": "89.233645"
              },
              {
                "id": "24",
                "division_id": "5",
                "name": "Rajshahi",
                "bn_name": "রাজশাহী",
                "lat": "24.3745",
                "long": "88.6042"
              },
              {
                "id": "25",
                "division_id": "5",
                "name": "Sirajgonj",
                "bn_name": "সিরাজগঞ্জ",
                "lat": "24.4533978",
                "long": "89.7006815"
              },
              {
                "id": "26",
                "division_id": "6",
                "name": "Dinajpur",
                "bn_name": "দিনাজপুর",
                "lat": "25.6217061",
                "long": "88.6354504"
              },
              {
                "id": "27",
                "division_id": "6",
                "name": "Gaibandha",
                "bn_name": "গাইবান্ধা",
                "lat": "25.328751",
                "long": "89.528088"
              },
              {
                "id": "28",
                "division_id": "6",
                "name": "Kurigram",
                "bn_name": "কুড়িগ্রাম",
                "lat": "25.805445",
                "long": "89.636174"
              },
              {
                "id": "29",
                "division_id": "6",
                "name": "Lalmonirhat",
                "bn_name": "লালমনিরহাট",
                "lat": "25.9923",
                "long": "89.2847"
              },
              {
                "id": "30",
                "division_id": "6",
                "name": "Nilphamari",
                "bn_name": "নীলফামারী",
                "lat": "25.931794",
                "long": "88.856006"
              },
              {
                "id": "31",
                "division_id": "6",
                "name": "Panchagarh",
                "bn_name": "পঞ্চগড়",
                "lat": "26.3411",
                "long": "88.5541606"
              },
              {
                "id": "32",
                "division_id": "6",
                "name": "Rangpur",
                "bn_name": "রংপুর",
                "lat": "25.7558096",
                "long": "89.244462"
              },
              {
                "id": "33",
                "division_id": "6",
                "name": "Thakurgaon",
                "bn_name": "ঠাকুরগাঁও",
                "lat": "26.0336945",
                "long": "88.4616834"
              },
              {
                "id": "34",
                "division_id": "1",
                "name": "Barguna",
                "bn_name": "বরগুনা",
                "lat": "22.0953",
                "long": "90.1121"
              },
              {
                "id": "35",
                "division_id": "1",
                "name": "Barishal",
                "bn_name": "বরিশাল",
                "lat": "22.7010",
                "long": "90.3535"
              },
              {
                "id": "36",
                "division_id": "1",
                "name": "Bhola",
                "bn_name": "ভোলা",
                "lat": "22.685923",
                "long": "90.648179"
              },
              {
                "id": "37",
                "division_id": "1",
                "name": "Jhalokati",
                "bn_name": "ঝালকাঠি",
                "lat": "22.6406",
                "long": "90.1987"
              },
              {
                "id": "38",
                "division_id": "1",
                "name": "Patuakhali",
                "bn_name": "পটুয়াখালী",
                "lat": "22.3596316",
                "long": "90.3298712"
              },
              {
                "id": "39",
                "division_id": "1",
                "name": "Pirojpur",
                "bn_name": "পিরোজপুর",
                "lat": "22.5841",
                "long": "89.9720"
              },
              {
                "id": "40",
                "division_id": "2",
                "name": "Bandarban",
                "bn_name": "বান্দরবান",
                "lat": "22.1953275",
                "long": "92.2183773"
              },
              {
                "id": "41",
                "division_id": "2",
                "name": "Brahmanbaria",
                "bn_name": "ব্রাহ্মণবাড়িয়া",
                "lat": "23.9570904",
                "long": "91.1119286"
              },
              {
                "id": "42",
                "division_id": "2",
                "name": "Chandpur",
                "bn_name": "চাঁদপুর",
                "lat": "23.2332585",
                "long": "90.6712912"
              },
              {
                "id": "43",
                "division_id": "2",
                "name": "Chattogram",
                "bn_name": "চট্টগ্রাম",
                "lat": "22.335109",
                "long": "91.834073"
              },
              {
                "id": "44",
                "division_id": "2",
                "name": "Cumilla",
                "bn_name": "কুমিল্লা",
                "lat": "23.4682747",
                "long": "91.1788135"
              },
              {
                "id": "45",
                "division_id": "2",
                "name": "Coxs Bazar",
                "bn_name": "কক্স বাজার",
                "lat": "21.4272",
                "long": "92.0058"
              },
              {
                "id": "46",
                "division_id": "2",
                "name": "Feni",
                "bn_name": "ফেনী",
                "lat": "23.0159",
                "long": "91.3976"
              },
              {
                "id": "47",
                "division_id": "2",
                "name": "Khagrachari",
                "bn_name": "খাগড়াছড়ি",
                "lat": "23.119285",
                "long": "91.984663"
              },
              {
                "id": "48",
                "division_id": "2",
                "name": "Lakshmipur",
                "bn_name": "লক্ষ্মীপুর",
                "lat": "22.942477",
                "long": "90.841184"
              },
              {
                "id": "49",
                "division_id": "2",
                "name": "Noakhali",
                "bn_name": "নোয়াখালী",
                "lat": "22.869563",
                "long": "91.099398"
              },
              {
                "id": "50",
                "division_id": "2",
                "name": "Rangamati",
                "bn_name": "রাঙ্গামাটি",
                "lat": "22.7324",
                "long": "92.2985"
              },
              {
                "id": "51",
                "division_id": "7",
                "name": "Habiganj",
                "bn_name": "হবিগঞ্জ",
                "lat": "24.374945",
                "long": "91.41553"
              },
              {
                "id": "52",
                "division_id": "7",
                "name": "Maulvibazar",
                "bn_name": "মৌলভীবাজার",
                "lat": "24.482934",
                "long": "91.777417"
              },
              {
                "id": "53",
                "division_id": "7",
                "name": "Sunamganj",
                "bn_name": "সুনামগঞ্জ",
                "lat": "25.0658042",
                "long": "91.3950115"
              },
              {
                "id": "54",
                "division_id": "7",
                "name": "Sylhet",
                "bn_name": "সিলেট",
                "lat": "24.8897956",
                "long": "91.8697894"
              },
              {
                "id": "55",
                "division_id": "4",
                "name": "Bagerhat",
                "bn_name": "বাগেরহাট",
                "lat": "22.651568",
                "long": "89.785938"
              },
              {
                "id": "56",
                "division_id": "4",
                "name": "Chuadanga",
                "bn_name": "চুয়াডাঙ্গা",
                "lat": "23.6401961",
                "long": "88.841841"
              },
              {
                "id": "57",
                "division_id": "4",
                "name": "Jashore",
                "bn_name": "যশোর",
                "lat": "23.16643",
                "long": "89.2081126"
              },
              {
                "id": "58",
                "division_id": "4",
                "name": "Jhenaidah",
                "bn_name": "ঝিনাইদহ",
                "lat": "23.5448176",
                "long": "89.1539213"
              },
              {
                "id": "59",
                "division_id": "4",
                "name": "Khulna",
                "bn_name": "খুলনা",
                "lat": "22.815774",
                "long": "89.568679"
              },
              {
                "id": "60",
                "division_id": "4",
                "name": "Kushtia",
                "bn_name": "কুষ্টিয়া",
                "lat": "23.901258",
                "long": "89.120482"
              },
              {
                "id": "61",
                "division_id": "4",
                "name": "Magura",
                "bn_name": "মাগুরা",
                "lat": "23.487337",
                "long": "89.419956"
              },
              {
                "id": "62",
                "division_id": "4",
                "name": "Meherpur",
                "bn_name": "মেহেরপুর",
                "lat": "23.762213",
                "long": "88.631821"
              },
              {
                "id": "63",
                "division_id": "4",
                "name": "Narail",
                "bn_name": "নড়াইল",
                "lat": "23.172534",
                "long": "89.512672"
              },
              {
                "id": "64",
                "division_id": "4",
                "name": "Satkhira",
                "bn_name": "সাতক্ষীরা",
                "lat": "22.7185",
                "long": "89.0705"
              }
            ]
          }';




    return view('exampleHosted', compact('cartDetails', 'discrticts'));
  }

  public function index(Request $request)
  {

    // dd($request->all());
    # Here you have to receive all the order data to initate the payment.
    # Let's say, your oder transaction informations are saving in a table called "orders"
    # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

    $post_data = array();
    $post_data['total_amount'] = $request->amount; # You cant not pay less than 10
    $post_data['currency'] = "BDT";
    $post_data['tran_id'] = uniqid(); // tran_id must be unique

    # CUSTOMER INFORMATION
    $post_data['name'] = $request->customer_name;
    $post_data['cus_email'] = $request->customer_email;
    $post_data['add1'] = $request->address;
    $post_data['cus_add2'] = "";
    $post_data['cus_city'] = "";
    $post_data['state'] = $request->dis;
    $post_data['cus_postcode'] = $request->post_code;
    $post_data['country'] = "Bangladesh";
    $post_data['cus_phone'] = $request->customer_mobile;
    $post_data['cus_fax'] = "";
    $post_data['prefer_date'] = $request->prefer_date;
    $post_data['zip'] = $request->post_code;

    # SHIPMENT INFORMATION
    $post_data['ship_name'] = "Store Test";
    $post_data['ship_add1'] = "Dhaka";
    $post_data['ship_add2'] = "Dhaka";
    $post_data['ship_city'] = "Dhaka";
    $post_data['ship_state'] = "Dhaka";
    $post_data['ship_postcode'] = "1000";
    $post_data['ship_phone'] = "";
    $post_data['ship_country'] = "Bangladesh";

    $post_data['shipping_method'] = "NO";
    $post_data['product_name'] = "physical goods";
    $post_data['product_category'] = "Goods";
    $post_data['product_profile'] = "physical-goods";

    # OPTIONAL PARAMETERS


    #Before  going to initiate the payment order status need to insert or update as Pending.
    $cartQuantity = Cart::where('user_id', auth()->id())->sum('qty');
    #Before  going to initiate the payment order status need to update as Pending.
    $update_product = Order::updateOrCreate(
      [
        'transaction_id' => $post_data['tran_id']
      ],
      [
        'name' => $post_data['name'],
        'prefer_date' => $post_data['prefer_date'],
        'email' => $post_data['cus_email'],
        'phone' => $post_data['cus_phone'],
        'total_price' => $post_data['total_amount'],
        'status' => 'Pending',
        'address' => $post_data['add1'],
        'state' => $post_data['state'],
        'country' => $post_data['country'],
        'zip' => $post_data['zip'],
        'user_id' => auth()->id(),
        'qty' => $cartQuantity,
        'transaction_id' => $post_data['tran_id'],
        'currency' => $post_data['currency'],
        'payment' => 'ssl',
      ]
    );

    if ($update_product) {
      $carts = Cart::with('products:id,price')->where('user_id', auth()->user()->id)->get();
      foreach ($carts as $item) {
        $orderItem = new OrderItem();
        $orderItem->order_id = $update_product->id;
        $orderItem->product_id = $item->product_id;
        $orderItem->qty = $item->qty;
        $orderItem->price = $item->products->price;
        $orderItem->save();
      }
    }
    $sslc = new SslCommerzNotification();
    # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
    $payment_options = $sslc->makePayment($post_data, 'hosted');

    if (!is_array($payment_options)) {
      print_r($payment_options);
      $payment_options = array();
    }
  }



  public function success(Request $request)
  {


    $tran_id = $request->input('tran_id');
    $amount = $request->input('amount');
    $currency = $request->input('currency');

    //* CLEAR CART

    $authUser = auth()->user();

    if ($authUser) {
      $carts = Cart::where('user_id', $authUser->id)->get();
      foreach ($carts as $cart) {
        $stock = Stock::where('product_id', $cart->product_id)->decrement('stock', $cart->qty);

        $cart->delete();
      }
    }



    $sslc = new SslCommerzNotification();

    #Check order status in order tabel against the transaction id or order id.
    $order_details = DB::table('orders')
      ->where('transaction_id', $tran_id)
      ->select('transaction_id', 'status', 'currency', 'total_price', 'id')->first();

    if ($order_details->status == 'Pending') {
      $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

      if ($validation) {
        /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
        $update_product = DB::table('orders')
          ->where('transaction_id', $tran_id)
          ->update(['status' => 'Processing']);
        return view('frontend.success');
        echo "<br >Transaction is successfully Completed";
      }
    } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
      if ($authUser) {
        Auth::login($authUser);
      }
      // return to_route('order.success', ['id' => $order_details->id]);
      return redirect(route('order.success', $order_details->id));

      /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
      echo "Transaction is successfully Completed";
    } else {
      #That means something wrong happened. You can redirect customer to your product page.
      echo "Invalid Transaction";
    }
  }

  public function fail(Request $request)
  {
    $tran_id = $request->input('tran_id');

    $order_details = DB::table('orders')
      ->where('transaction_id', $tran_id)
      ->select('transaction_id', 'status', 'currency', 'amount')->first();

    if ($order_details->status == 'Pending') {
      $update_product = DB::table('orders')
        ->where('transaction_id', $tran_id)
        ->update(['status' => 'Failed']);
      echo "Transaction is Falied";
    } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
      echo "Transaction is already Successful";
    } else {
      echo "Transaction is Invalid";
    }
  }

  public function cancel(Request $request)
  {
    $tran_id = $request->input('tran_id');

    $order_details = DB::table('orders')
      ->where('transaction_id', $tran_id)
      ->select('transaction_id', 'status', 'currency', 'amount')->first();

    if ($order_details->status == 'Pending') {
      $update_product = DB::table('orders')
        ->where('transaction_id', $tran_id)
        ->update(['status' => 'Canceled']);
      echo "Transaction is Cancel";
    } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
      echo "Transaction is already Successful";
    } else {
      echo "Transaction is Invalid";
    }
  }

  public function ipn(Request $request)
  {
    #Received all the payement information from the gateway
    if ($request->input('tran_id')) #Check transation id is posted or not.
    {

      $tran_id = $request->input('tran_id');

      #Check order status in order tabel against the transaction id or order id.
      $order_details = DB::table('orders')
        ->where('transaction_id', $tran_id)
        ->select('transaction_id', 'status', 'currency', 'amount')->first();

      if ($order_details->status == 'Pending') {
        $sslc = new SslCommerzNotification();
        $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
        if ($validation == TRUE) {
          /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
          $update_product = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->update(['status' => 'Processing']);

          echo "Transaction is successfully Completed";
        }
      } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

        #That means Order status already updated. No need to udate database.

        echo "Transaction is already successfully Completed";
      } else {
        #That means something wrong happened. You can redirect customer to your product page.

        echo "Invalid Transaction";
      }
    } else {
      echo "Invalid Data";
    }
  }
}
