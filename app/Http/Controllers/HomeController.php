<?php

namespace App\Http\Controllers;

use App\Charts\home;
use App\Models\Invoice;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $invoice = Invoice::select('Status', \DB::raw('count(*) as count'))
            ->groupBy('Status')->pluck('count', 'Status');

        $labels = $invoice->keys();
        $data = $invoice->values();

        return view('home', compact('labels', 'data'));
    }
}
