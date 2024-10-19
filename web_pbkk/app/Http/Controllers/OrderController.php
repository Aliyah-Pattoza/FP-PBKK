<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan halaman keranjang
    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('order.cart', compact('cart'));
    }

    // Tambahkan menu ke dalam keranjang
    public function addToCart($menu_id)
    {
        $menu = Menu::findOrFail($menu_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$menu_id])) {
            $cart[$menu_id]['quantity']++;
        } else {
            $cart[$menu_id] = [
                'name' => $menu->name,
                'quantity' => 1,
                'price' => $menu->price,
                'image' => $menu->image,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Menu added to cart');
    }

    // Mengurangi jumlah menu di keranjang
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $menu_id = $request->menu_id;

        if (isset($cart[$menu_id])) {
            $cart[$menu_id]['quantity'] = $request->quantity;
            if ($cart[$menu_id]['quantity'] <= 0) {
                unset($cart[$menu_id]);
            }
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    // Hapus item dari keranjang
    public function removeFromCart($menu_id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$menu_id])) {
            unset($cart[$menu_id]);
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    // Simpan order ke database (Checkout)
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty');
        }

        $order = Order::create([
            'user_id' => Auth::user()->id, // Memastikan menggunakan Auth untuk mendapatkan user ID
            'total_price' => array_sum(array_map(function ($item) {
                return $item['quantity'] * $item['price'];
            }, $cart)),
            'status' => 'pending',
        ]);

        foreach ($cart as $menu_id => $item) {
            Order_Item::create([
                'order_id' => $order->id,
                'menu_id' => $menu_id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Kosongkan keranjang setelah checkout
        session()->forget('cart');
        return redirect('/dashboard/orders')->with('success', 'Order placed successfully');
    }

    // Menampilkan halaman sukses setelah checkout
    public function success()
    {
        return view('order.success');
    }

    // Menampilkan semua order di halaman dashboard
    public function showOrders()
    {
        $orders = Order::with('items.menu')->where('user_id', Auth::user()->id)->get();
        return view('dashboard.orders', compact('orders'));
    }
}