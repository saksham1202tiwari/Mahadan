<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Donation;
use App\Models\Event;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

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
        if (auth()->user()->user_type !== 1) {
            return redirect()->route('guest');
        }

        $chart_options = [
            'chart_title' => 'Number of Donations by last month',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Donation',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_days' => 30, // show only last 30 days
        ];

        $chart1 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Total Money Received',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Donation',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
        ];

        $chart2 = new LaravelChart($chart_options);

        $data = [
            'total_events' => Event::count(),
            'total_donations' => Donation::count(),
            'total_money_raised' => Donation::sum('amount'),
            'total_blogs' => Blog::approved()->count(),
            'chart1' => $chart1,
            'chart2' => $chart2
        ];


        return view('home', $data);
    }

    public function guest()
    {
        return view('guest');
    }
}
