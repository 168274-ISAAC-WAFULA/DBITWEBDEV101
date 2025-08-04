<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBalanceMiddleware
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

        // Check if payment method is wallet and if user has sufficient balance
        if ($request->input('payment_method') === 'wallet') {
            $totalAmount = $request->input('total_amount') ?? $request->input('amount') ?? 0;
            
            if ($user->balance < $totalAmount) {
                return back()->with('error', 'Insufficient wallet balance. Please top up your wallet or choose a different payment method.');
            }
        }

        return $next($request);
    }
}