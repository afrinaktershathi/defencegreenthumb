<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Invoice</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' />
</head>

<body>
    <center>
        <table class="bg-white" width="500" align="center" style="font-family: arial">
            <tr>
                <td style="padding: 15px    ;text-align:center;">
                    <h4>{{ env('APP_NAME') }}</h4>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <address>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</address>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <p>Phone: <b>01997492233</b></p>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <p>Email: <b>test@gmail.com</b></p>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;">
                    <p style="padding: 10px 0 10px 0 "><b>Retail Invoice</b></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="padding: 10px 20px "><b>Date: {{ today()->format('d M, Y') }}</b></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="padding: 0px 20px ">Bill No: <b>{{ $order['id'] }}</b></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="padding: 0px 20px ">Payment Type: <b>{{ $order['payment'] }}</b></p>
                </td>
            </tr>
            <tr>
                <td style="padding: 20px 10px">
                    <table width="100%" border="1">
                        <tr align="center" style="border-bottom: 1px solid #ccc;">
                            <td style="padding: 10px 0">Item</td>
                            <td style="padding: 10px 0">Qty</td>
                            <td style="padding: 10px 0">Amount</td>
                        </tr>
                        @foreach ($order['orderItems'] as $orderItem)
                        <tr align="center" style="border-bottom: 1px solid #ccc;">
                            <td style="padding: 10px 0">{{ $orderItem['products']['name'] }}</td>
                            <td style="padding: 10px 0">{{ $orderItem['qty'] }}</td>
                            <td style="padding: 10px 0">{{ $orderItem['price'] }} tk</td>
                        </tr>
                        @endforeach
                        <tfoot>
                            <tr align="center">
                                <td style="padding: 10px 0">Total</td>
                                <td style="padding: 10px 0">{{ $order['qty'] }}</td>
                                <td style="padding: 10px 0">{{ $order['total_price'] }} tk</td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding: 0 0 15px 0"></td>
            </tr>
        </table>
    </center>
</body>

</html>