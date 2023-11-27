<?php

namespace App\Http\Controllers\AdminControllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Charges;
use App\Models\Phone;
use App\Models\PurchasedPhones;
use App\Models\User;

class Dashboard extends Controller
{
    public function dashboard()
    {
        $soldPhones = Phone::all();
        $totalAmount = 0;
        $totalPhones = 0;
        $totalSold = 0;
        $phoneSoldPrice=0;
        foreach ($soldPhones as $phone) {
            $totalAmount += $phone->price;
            $totalPhones++;
            if ($phone->status == "Sold") {
                $totalSold++;
                $phoneSoldPrice=$phoneSoldPrice+$phone->price;
            }
        }
        $totalReturn = PurchasedPhones::where('status', 'Returned')->count();

        $totalCustomer = User::count();
        $revenue = ($phoneSoldPrice * Charges::first()->inspection_fee) / 100;

        // $totalAmount now contains the sum of all phone prices
// Retrieve user data from the database
        $users = User::select('created_at')
            ->orderBy('created_at')
            ->get();

// Format the data for Chart.js
        $data = [];
        foreach ($users as $user) {
            $data[] = [
                'x' => $user->created_at->format('Y-m-d'), // Format the timestamp as needed
                'y' => 1, // Each user represents a value of 1 on the y-axis
            ];
        }

        return view('AdminViews.Dashboard.index', compact(['totalAmount', 'totalSold', 'revenue', 'totalPhones', 'totalCustomer', 'totalReturn','data']));
    }
}
