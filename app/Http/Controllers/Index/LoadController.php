<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoadController extends Controller
{
    //
    public function index(){
        $data = [
            'title' => 'Welcome to Loan Calculator',
        ];


        return view('welcome', $data);
    }


    public function calculate(Request $request){

        $body = $request->except('_token');

        // Convert amount from string to number
        $amount = str_replace([',', '₦', ' '],'',$body['amount']);

        // interest Calculation in Amount
        $si = ($amount * $body['months']/12 * $body['interest'])/ 100;

        // Total Amount to be paid
        $totalAmount = $si + $amount;

        // monthly amount to be paid
        $monthlyAmount = $totalAmount / $body['months'];


        // returning an array of the results and converting amount to readable info for users
        $payment = [
            'months' => $body['months'],
            'monthlyAmount' => $this->format_money($monthlyAmount),
            'principal' => $body['amount'],
            'interestInNaira' => $this->format_money($si),
            'totalAmountInNaira' => $this->format_money($totalAmount),
            'interestInPer' => $body['interest']
        ];


        $data = [
            'title' => 'Your money has been calculated',
            'payment' => $payment
        ];


        return view('welcome', $data);
    }

    public function format_money($money){
        // changes the number to currency format and adds  a preceding 'USD'
        $formattedInUSD = number_format($money, 2);

        // changes the preceding 'USD' to ''
        return str_replace(['USD'],'',$formattedInUSD);
    }
}
