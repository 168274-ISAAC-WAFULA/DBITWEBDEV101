<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user->hasRole('admin')) {
            return $this->adminDashboard();
        }
        
        if ($user->hasRole('owner')) {
            return $this->ownerDashboard();
        }
        
        if ($user->hasRole('manager')) {
            return $this->managerDashboard();
        }
        
        if ($user->hasRole('cashier')) {
            return $this->cashierDashboard();
        }
        
        if ($user->hasRole('customerservice')) {
            return $this->customerServiceDashboard();
        }
        
        // Default dashboard for authenticated users without specific roles
        return $this->defaultDashboard();
    }
    
    protected function adminDashboard()
    {
        return view('dashboards.admin');
    }
    
    protected function ownerDashboard()
    {
        return view('dashboards.owner');
    }
    
    protected function managerDashboard()
    {
        return view('dashboards.manager');
    }
    
    protected function cashierDashboard()
    {
        return view('dashboards.cashier');
    }
    
    protected function customerServiceDashboard()
    {
        return view('dashboards.customerservice');
    }
    
    protected function defaultDashboard()
    {
        return view('dashboards.default');
    }
}
