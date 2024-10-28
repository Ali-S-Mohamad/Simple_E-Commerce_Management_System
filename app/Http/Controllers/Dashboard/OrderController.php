<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetching orders by filters
        $request = request();
        $orders = Order::filter($request->query())->paginate(10);
        return view('dashboard.orders.index', compact('orders'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    // update order
    public function shipOrder(string $id){
        $order = Order::findOrFail($id);
        $order->status = 'shipped';
        $order->save();
        return redirect()->route('dashboard.orders.index')
        ->with('success', 'Order shipped!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('dashboard.orders.index')
            ->with('success', 'Order deleted!');
    }

    // View the Trashed orders
    public function trash()
    {
        $orders = Order::onlyTrashed()->with('product')->paginate();
        return view('dashboard.orders.trash', compact(var_name: 'orders'));
    }

    // Restore Soft Deleting Order
    public function restore(Request $request, $id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        $order->restore();

        return redirect()->route('dashboard.orders.trash')
            ->with('success', 'order restored!');
    }

    // Deleting Order forever
    public function forceDelete($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        $order->forceDelete();

        // if ($order->image) {
        //     Storage::disk('public')->delete($order->image);
        // }

        return redirect()->route('dashboard.orders.trash')
            ->with('success', 'order deleted forever!');
    }

    // public function
}
