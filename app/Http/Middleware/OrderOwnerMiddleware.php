<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $user = Auth::user();
        $orderId = $request->route('order') ?? $request->route('id');

        // If user is admin or staff, allow access to all orders
        if ($user->hasRole('admin') || $user->hasRole('staff')) {
            return $next($request);
        }

        // For customers, check if they own the order
        if ($orderId) {
            $order = Order::find($orderId);
            
            if (!$order || $order->user_id !== $user->id) {
                abort(403, 'Access denied. You can only access your own orders.');
            }
        }

        return $next($request);
    }
}