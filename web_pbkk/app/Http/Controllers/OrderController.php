<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan halaman pembuatan order
    public function create(Request $request)
    {
        $category = $request->query('category', 'all');
        // Menampilkan menu berdasarkan kategori yang dipilih
        if ($category === 'all') {
            $menus = Menu::all();
        } else {
            $menus = Menu::where('category', $category)->get();
        }
        
        return view('orders.create', [
            'menus' => $menus,
            'category' => $category,
        ]);
    }

    // Menyimpan pesanan ke database
    public function store(Request $request)
    {
        // Menghitung total harga dari semua item yang dipesan
        $totalPrice = 0;
        foreach ($request->input('hidangan', []) as $menuId) {
            $menu = Menu::findOrFail($menuId);  // Pastikan menu ditemukan
            $quantity = $request->input('jumlah_hidangan' . $menuId);
            $totalPrice += $menu->price * $quantity;
        }

        // Membuat order baru
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'pending'
        ]);

        // Membuat detail order untuk setiap item
        foreach ($request->input('hidangan', []) as $menuId) {
            $menu = Menu::findOrFail($menuId);
            $quantity = $request->input('jumlah_hidangan' . $menuId);

            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $menuId,
                'quantity' => $quantity,
                'price' => $menu->price * $quantity
            ]);
        }

        // Mengarahkan pengguna ke halaman index order
        return redirect()->route('orders.index');
    }

    public function cancel($id)
    {
        $order = Order::find($id);

        if ($order->status == 'pending' || $order->status == 'confirmed') {
            $order->status = 'canceled';
            $order->save();

            return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibatalkan.');
        }

        return redirect()->route('orders.index')->with('error', 'Pesanan tidak bisa dibatalkan.');
    }

    // Menampilkan daftar pesanan
    public function index()
    {
        // Mengambil semua pesanan pengguna yang sedang login
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders.index', compact('orders'));
    }
}
