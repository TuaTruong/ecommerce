<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use PDF;
class OrderController extends Controller
{
    public function print_order($checkout_code)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }

    public function print_order_convert($checkout_code)
    {
        $order_details = OrderDetails::where('code', $checkout_code)->get();
        $order = Order::where('code', $checkout_code)->first();
        $user = $order->user;
        $shipping = $order->shipping;
        $coupon = Coupon::where('code', $order_details[0]->product_coupon)->first();

        $total = 0;

        $output = '
        <style>
            body{
                font-family: Dejavu Sans;
            }
            .table-styling{
                border: 1px solid #000;
            }
            .table-styling tr td{
                border: 1px solid #000;
            }
        </style>

    <h1><center>Công ty TNHH 1 thành viên ABCD</center></h1>
    <h4><center>Độc lập - Tự do - Hạnh phúc</center></h4>
    <table class="table-styling">
        <thead>
            <tr>
                <th>Tên khách đặt hãng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Ghi chú</th>
            </tr>
        </thead>

        <tbody>
        ';
        $output .=
            '
            <tr>
            <td>' .
            $shipping->name .
            '</td>
            <td>' .
            $shipping->address .
            '</td>
            <td>' .
            $shipping->phone .
            '</td>
            <td>' .
            $shipping->email .
            '</td>
            <td>' .
            $shipping->notes .
            '</td>
            </tr>
        ';

        $output .= '
        </tbody>
        </table>

        <p>Đơn đặt hàng</p>
        <table class="table-styling">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá sản phẩm</th>
                <th>Thành tiền</th>
            </tr>
        </thead>

        <tbody>';
        foreach ($order_details as $ord) {
            $output .=
                '
                <tr>
                    <td>' .
                $ord->product_name .
                '</td>
                    <td>' .
                $ord->product_quantity .
                '</td>
                    <td>' .
                number_format($ord->product_price, 0, ',', '.') .
                ' VND</td>
                    <td>' .
                number_format($ord->product_quantity * $ord->product_price, 0, ',', '.') .
                ' VND</td>
                </tr>
            ';
            $total += $shipping->product_quantity * $shipping->product_price;
        }
        if ($coupon) {
            if ($coupon->condition == 0) {
                $output .=
                    '
                <tr>
                    <td></td>
                    <td></td>
                    <td>Giảm giá</td>
                    <td>' .
                    number_format($coupon->discount, 0, ',', '.') .
                    'VND</td>
                </tr>
                ';
                $total -= $coupon->discount;
            } else {
                $output .=
                    '
                <tr>
                    <td></td>
                    <td></td>
                    <td>Giảm giá</td>
                    <td>' .
                    $coupon->discount .
                    ' %</td>
                </tr>
                ';
                $total -= ($total * $coupon->discount) / 100;
            }
        }

        $output .=
            '
        <tr>
            <td></td>
            <td></td>
            <td>Phí ship</td>
            <td>' .
            number_format($order_details[0]->feeship, 0, ',', '.') .
            'VND</td>
        </tr>
        ';
        $total += $order_details[0]->feeship;
        $output .=
            '
        <tr>
            <td></td>
            <td></td>
            <td>Thành tiền</td>
            <td>' .
            number_format($total, 0, ',', '.') .
            'VND</td>
        </tr>
        ';

        $output .= '
        </tbody>
        </table>

        <p>Ký tên</p>
        <table>
        <thead>
            <tr>
                <th width="200px">Người lập phiếu</th>
                <th width="800px">Người nhận</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
        ';
        return $output;
    }

    public function manage_order()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view('admin.all_orders', [
            'orders' => $orders,
        ]);
    }

    public function view_order($order_code)
    {
        $order_details = OrderDetails::where('code', $order_code)->get();
        $order = Order::where('code', $order_code)->first();
        $user = $order->user;
        $shipping = $order->shipping;
        $coupon = Coupon::where('code', $order_details[0]->product_coupon)->first();

        return view('admin.view_order', [
            'order_details' => $order_details,
            'order' => $order,
            'user' => $user,
            'shipping' => $shipping,
            'coupon' => $coupon,
        ]);
    }

    public function update_order_status()
    {
        request()->validate([
            'order_status' => 'required',
            'order_id' => 'required',
            'quantity' => 'required',
            'order_product_id' => 'required',
        ]);

        $order = Order::find(request('order_id'));
        $order->update([
            'status' => request('order_status'),
        ]);

        foreach (request('order_product_id') as $index => $product_id) {
            $product = Product::find($product_id);
            $product_quantity = $product->qty;
            $product_sold = $product->sold_qty;
            if ($order->status == 2) {
                $product->update([
                    'qty' => $product_quantity - request('quantity')[$index],
                    'sold_qty' => $product_sold + request('quantity')[$index],
                ]);
            } elseif ($order->status != 2 && $order->status != 3) {
                $product->update([
                    'qty' => $product_quantity + request('quantity')[$index],
                    'sold_qty' => $product_sold - request('quantity')[$index],
                ]);
            }
        }
    }

    public function update_order_quantity()
    {
        request()->validate([
            'order_product_id' => 'required',
            'order_qty' => 'required',
            'order_code' => 'required',
        ]);

        $order_details = OrderDetails::where('product_id', request('order_product_id'))
            ->where('code', request('order_code'))
            ->first();

        $order_details->update([
            'product_quantity' => request('order_qty'),
        ]);
    }
}
