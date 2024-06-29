<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;

class DashboardController extends Controller
{
    
    public function index(){
        return view('dashboard.index');
    }

    public function transactionData(Request $request){
        $data['timePeriod'] = $request->input('timePeriod');
        $data['startDate'] = $request->input('startDate');
        $data['endDate'] = $request->input('endDate');
        

        if(!empty($data['timePeriod'])){
            if($data['timePeriod'] == 'today'){
                $data['resultToday'] = $this->transactionToday($data);
            }elseif($data['timePeriod'] == 'week'){
                $data['resultWeek'] = $this->transactionWeek($data);
            }elseif($data['timePeriod'] == 'month'){
                $data['resultMonth'] = $this->transactionMonth($data);
            }elseif($data['timePeriod'] == 'quarter'){
                $data['resultQuarter'] = $this->transactionQuarter($data);
            }elseif($data['timePeriod'] == 'semester'){
                $data['resultSemester'] = $this->transactionSemester($data);
            }elseif($data['timePeriod'] == 'year'){
                $data['resultYear'] = $this->transactionYear($data);
            }else{
                $result = 'null';
            }

        }

        // dd($data['startDate'],$data['endDate']);
        return response()->json($data);
        
    }
    
    public function transactionToday($data){
        $currentDate = Carbon::today();
        $chartData = [];
    
        for ($hour = 0; $hour < 24; $hour++) {
            $startOfDay = $currentDate->copy()->hour($hour)->minute(0)->second(0);
            $endOfDay = $currentDate->copy()->hour($hour)->minute(59)->second(59);
    
            $transactions = Transaction::whereBetween('created_at', [$startOfDay, $endOfDay])
                ->count();
    
            $chartData[] = $transactions;
        }
        return $chartData;
    }
    
    public function transactionTodayQuery($data){
        dd($data);
        return $data;
    }
    
    public function transactionWeek($data){
        $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $chartData = [];
        
        foreach ($daysOfWeek as $day) {
            $startOfDay = Carbon::now()->startOfWeek()->next($day);
            $endOfDay = $startOfDay->copy()->endOfDay();
        
            $transactions = DB::table('transactions')
                ->whereBetween('created_at', [$startOfDay, $endOfDay])
                ->count();
        
            $chartData[] = $transactions; // Store transaction count directly in the array
        }
        
        
        // dd($chartData);
        // $data['orders'] = DB::table('orders')
        //     ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
        //     ->count();

        return $chartData;
    }
    
    public function transactionMonth($data)
    {
        $currentYear = Carbon::now()->year;
        $chartData = [];
        
        // Iterate over each month
        for ($month = 1; $month <= 12; $month++) {
            $startOfMonth = Carbon::createFromDate($currentYear, $month, 1, 'UTC')->startOfMonth();
            $endOfMonth = $startOfMonth->copy()->endOfMonth();
            
            
            DB::enableQueryLog();
    
            // $transactions = Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
    
            $transactions = Transaction::whereBetween('created_at', [
                $startOfMonth->format('Y-m-d H:i:s'),
                $endOfMonth->format('Y-m-d H:i:s')
            ])->count();

            
            $chartData[] = $transactions;
        }
        // dd($chartData);
        return $chartData;
    }
    
    public function transactionQuarter($data)
    {
        $currentYear = Carbon::now()->year;
        $chartData = [];

        // Iterate over each quarter
        for ($quarter = 1; $quarter <= 4; $quarter++) {
            // Determine the start and end months for the quarter
            $startMonth = ($quarter - 1) * 3 + 1;
            $endMonth = $quarter * 3;

            // Set the start and end of the quarter using Carbon
            $startOfQuarter = Carbon::createFromDate($currentYear, $startMonth, 1, 'UTC')->startOfMonth();
            $endOfQuarter = Carbon::createFromDate($currentYear, $endMonth, 1, 'UTC')->endOfMonth();

            DB::enableQueryLog();

            // Retrieve transactions for the quarter
            $transactions = Transaction::whereBetween('created_at', [
                $startOfQuarter->format('Y-m-d H:i:s'),
                $endOfQuarter->format('Y-m-d H:i:s')
            ])->count();

            $chartData[] = $transactions;
        }

        // dd($chartData);
        return $chartData;
    }

    public function transactionSemester($data)
    {
        $semester_value = [];
        $semester_name = [];

        $currentYear = Carbon::now()->year;
        $semesterValues = [];
        $semesterNames = [];

        $currentYear_before = Carbon::now()->subYear()->year;
        $semesterValues_before = [];
        $semesterNames_before = [];
    
        // Iterate over each semester
        for ($semester = 1; $semester <= 2; $semester++) {
            // Determine the start and end months for the semester
            $startMonth = ($semester - 1) * 6 + 1;
            $endMonth = $semester * 6;
    
            // Set the start and end of the semester using Carbon
            $startOfSemester = Carbon::createFromDate($currentYear, $startMonth, 1, 'UTC')->startOfMonth();
            $endOfSemester = Carbon::createFromDate($currentYear, $endMonth, 1, 'UTC')->endOfMonth();
    
            DB::enableQueryLog();
    
            // Retrieve transactions for the semester
            $transactions = Transaction::whereBetween('created_at', [
                $startOfSemester->format('Y-m-d H:i:s'),
                $endOfSemester->format('Y-m-d H:i:s')
            ])->count();
    
            // Store transactions count in semesterValues array
            $semesterValues[] = $transactions;
            $data['semester_value'] = $semesterValues;
    
            // Store semester name in semesterNames array
            $semesterNames[] = "Semester $semester 2024";
            $data['semester_name'] = $semesterNames;
        }
    
        // Iterate over each semester year before
        for ($semester_before = 1; $semester_before <= 2; $semester_before++) {
            // Determine the start and end months for the semester
            $startMonthYearBefore = ($semester_before - 1) * 6 + 1;
            $endMonthYearBefore = $semester_before * 6;
    
            // Set the start and end of the semester using Carbon
            $startOfSemester = Carbon::createFromDate($currentYear_before, $startMonthYearBefore, 1, 'UTC')->startOfMonth();
            $endOfSemester = Carbon::createFromDate($currentYear_before, $endMonthYearBefore, 1, 'UTC')->endOfMonth();
    
            DB::enableQueryLog();
    
            // Retrieve transactions for the semester
            $transactions_before = Transaction::whereBetween('created_at', [
                $startOfSemester->format('Y-m-d H:i:s'),
                $endOfSemester->format('Y-m-d H:i:s')
            ])->count();
    
            // Store transactions count in semesterValues array
            $semesterValues_before[] = $transactions_before;
            $data['semester_value_before'] = $semesterValues_before;
    
            // Store semester name in semesterNames array
            $semesterNames_before[] = "Semester $semester_before 2023";
            $data['semester_name_before'] = $semesterNames_before;
        }

        $semester_value = array_merge($semesterValues, $semesterValues_before);
        $semester_name = array_merge($semesterNames, $semesterNames_before);
        
        // dd($semester_value, $semester_name);
        return ['semester_value' => $semester_value, 'semester_name' => $semester_name];
    }
    
    public function transactionYear($data)
    {
        $currentYear = Carbon::now()->year;
        $year_name_transaction = [];
        $year_sum_transaction = [];

        // Iterate over each year
        for ($year = $currentYear - 5; $year <= $currentYear; $year++) {
            $yearTotal = 0;

            // Iterate over each semester
            for ($semester = 1; $semester <= 2; $semester++) {
                // Determine the start and end months for the semester
                $startMonth = ($semester - 1) * 6 + 1;
                $endMonth = $semester * 6;

                // Set the start and end of the semester using Carbon
                $startOfSemester = Carbon::createFromDate($year, $startMonth, 1, 'UTC')->startOfMonth();
                $endOfSemester = Carbon::createFromDate($year, $endMonth, 1, 'UTC')->endOfMonth();

                DB::enableQueryLog();

                // Retrieve transactions for the semester
                $transactions = Transaction::whereBetween('created_at', [
                    $startOfSemester->format('Y-m-d H:i:s'),
                    $endOfSemester->format('Y-m-d H:i:s')
                ])->count();

                // Accumulate transactions count in yearTotal
                $yearTotal += $transactions;
            }

            // Store year and its total transactions in the respective arrays
            $year_name_transaction[] = $year;
            $year_sum_transaction[] = $yearTotal;
        }

        // Debugging: Display the arrays
        // dd($year_name_transaction, $year_sum_transaction);

        // Return the arrays if needed
        return ['year_name_transaction' => $year_name_transaction, 'year_sum_transaction' => $year_sum_transaction];
    }



    public function dashboardtoday(){
        $data['transactions'] = DB::table('transactions')
            ->whereDate('created_at', Carbon::today())
        ->count();

        $data['transaction_yesterday'] = DB::table('transactions')
            ->whereDate('created_at', Carbon::yesterday())
        ->count();

        // Hitung total_price transaksi hari ini
        $data['totalPriceToday'] = DB::table('transactions')
            ->whereDate('created_at', Carbon::today())
        ->sum('total_price');

        // Hitung total_price transaksi hari kemarin
        $data['totalPriceYesterday'] = DB::table('transactions')
            ->whereDate('created_at', Carbon::yesterday())
        ->sum('total_price');

        // Menghindari pembagian dengan nol
        if ($data['totalPriceYesterday'] != 0) {
                // Hitung persentase perubahan harga
                $data['priceChangePercentage'] = (($data['totalPriceToday'] - $data['totalPriceYesterday']) / $data['totalPriceYesterday']) * 100;
            } else {
                // Atur persentase perubahan harga menjadi null atau nilai default yang sesuai
                $data['priceChangePercentage'] = null;
        }

        $data['transaction_price_change_percentage'] = $data['priceChangePercentage'];

        // ===================ORDERs =====================
        $data['orders'] = DB::table('orders')
            ->whereDate('created_at', Carbon::today())
        ->count();

        
        $data['order_yesterday'] = DB::table('orders')
            ->whereDate('created_at', Carbon::yesterday())
        ->count();

        
        // Hitung total_price order hari ini
        $data['totalPriceTodayOrder'] = DB::table('orders')
            ->whereDate('created_at', Carbon::today())
        ->sum('total_price');

        // Hitung total_price order hari kemarin
        $data['totalPriceYesterdayOrder'] = DB::table('orders')
            ->whereDate('created_at', Carbon::yesterday())
        ->sum('total_price');

        // Menghindari pembagian dengan nol
        if ($data['totalPriceYesterdayOrder'] != 0) {
                // Hitung persentase perubahan harga
                $data['priceChangePercentageOrder'] = (($data['totalPriceTodayOrder'] - $data['totalPriceYesterdayOrder']) / $data['totalPriceYesterdayOrder']) * 100;
            } else {
                // Atur persentase perubahan harga menjadi null atau nilai default yang sesuai
                $data['priceChangePercentageOrder'] = null;
        }

        $data['order_price_change_percentage'] = $data['priceChangePercentageOrder'];

        return response()->json($data);

    }

    public function dashboardweek()
    {
        $startOfWeek = Carbon::now()->startOfWeek(); // Start of the current week
        $endOfWeek = Carbon::now()->endOfWeek();     // End of the current week
    
        $data['transactions'] = DB::table('transactions')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();
    
        $data['orders'] = DB::table('orders')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();
    
        return response()->json($data);
    }

    public function dashboardmonth()
    {
        $startOfMonth = Carbon::now()->startOfMonth(); // Start of the current month
        $endOfMonth = Carbon::now()->endOfMonth();     // End of the current month

        $data['transactions'] = DB::table('transactions')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->count();

        $data['orders'] = DB::table('orders')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->count();

        return response()->json($data);
    }

    public function dashboardquarter()
    {
        $startOfQuarter = Carbon::now()->startOfQuarter(); // Start of the current quarter
        $endOfQuarter = Carbon::now()->endOfQuarter();     // End of the current quarter

        $data['transactions'] = DB::table('transactions')
            ->whereBetween('created_at', [$startOfQuarter, $endOfQuarter])
            ->count();

        $data['orders'] = DB::table('orders')
            ->whereBetween('created_at', [$startOfQuarter, $endOfQuarter])
            ->count();

        return response()->json($data);
    }

    public function dashboardsemester()
    {
        // Define the start and end months of each semester
        $startOfFirstSemester = Carbon::now()->startOfYear();
        $endOfFirstSemester = Carbon::now()->addMonths(5)->endOfMonth();

        $startOfSecondSemester = Carbon::now()->addMonths(6)->startOfMonth();
        $endOfSecondSemester = Carbon::now()->endOfYear();

        // Check which semester we are currently in and set the start and end accordingly
        if (Carbon::now()->month <= 5) {
            $startOfSemester = $startOfFirstSemester;
            $endOfSemester = $endOfFirstSemester;
        } else {
            $startOfSemester = $startOfSecondSemester;
            $endOfSemester = $endOfSecondSemester;
        }

        $data['transactions'] = DB::table('transactions')
            ->whereBetween('created_at', [$startOfSemester, $endOfSemester])
            ->count();

        $data['orders'] = DB::table('orders')
            ->whereBetween('created_at', [$startOfSemester, $endOfSemester])
            ->count();

        return response()->json($data);
    }

    public function dashboardyear()
    {
        $startOfYear = Carbon::now()->startOfYear(); // Start of the current year
        $endOfYear = Carbon::now()->endOfYear();     // End of the current year

        $data['transactions'] = DB::table('transactions')
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->count();

        $data['orders'] = DB::table('orders')
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->count();

        return response()->json($data);
    }

    public function dashboardtransactionperiod(){

        $data['dataToday'] = [];
      
        $data['timePeriod'] = request('timePeriod');
        $data['startDate'] = request('startDate');
        $data['endDate'] = request('endDate');
        switch ($data['timePeriod']) {
            case 'today':
                $data['today'] = DB::table('transactions')
                ->whereDate('created_at', '=', Carbon::today())
                ->sum('total_price');
            
                break;
            case 'week':
                $data['timePeriod'] = now()->startOfWeek();
                break;
            case 'month':
                $data['timePeriod'] = now()->startOfMonth();
                break;
            case 'quarter':
                $data['timePeriod'] = now()->startOfQuarter();
                break;
            case 'semester':
                $data['timePeriod'] = now()->startOfSemester(); // Assuming a custom function for this
                break;
            case 'year':
                $data['timePeriod'] = now()->startOfYear();
                break;
        }

        return response()->json($data);

    }

    public function weeklySalesChangePrecentage(){

        $data =  array('120','200');

        // $data = ($dataThisWeek - $dataLastWeek) / abs($dataLastWeek) * 100;

        return $data;
        
    }

    public function datacharttoday()
    {
        $currentDate = Carbon::today();
        $chartData = [];
    
        for ($hour = 0; $hour < 24; $hour++) {
            $startOfDay = $currentDate->copy()->hour($hour)->minute(0)->second(0);
            $endOfDay = $currentDate->copy()->hour($hour)->minute(59)->second(59);
    
            $transactions = Transaction::whereBetween('created_at', [$startOfDay, $endOfDay])
                ->count();
    
            $chartData[] = $transactions;
        }
    
        // Log the query results
        \Log::info('Chart Data:', $chartData);
    
        return $chartData;
    }

    public function getChartData(Request $request)
    {
        $currentYear = date('Y');
        $chartData = [];

        // Fetch data for each month of the current year from the transactions table
        for ($month = 1; $month <= 12; $month++) {
            $transactions = Transaction::whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $month)
                ->count();

            // You might want to adjust the sum() based on your actual column structure
            $chartData[] = $transactions;
        }

        return response()->json(['data' => $chartData]);
    }

    public function datachartorder(){
        // $data = Order::groupBy('status_id')
        // ->select(DB::raw('count(*) as count'), 'status_id')
        // ->pluck('count', 'status_id');

        // $data = DB::table('orders')
        //     ->leftJoin('status_masters', 'orders.status_id', '=', 'status_masters.status_id')
        //     ->groupBy('orders.status_id', 'status_masters.name')
        //     ->select(DB::raw('count(*) as count'), 'orders.status_id', 'status_masters.name')
        //     ->pluck('count', 'status_masters.name');

        $queryResult = DB::table('orders')
        ->leftJoin('status_masters', 'orders.status_id', '=', 'status_masters.status_id')
        ->groupBy('orders.status_id', 'status_masters.name')
        ->select(DB::raw('count(*) as count'), 'orders.status_id', 'status_masters.name')
        ->orderByDesc('count')
        ->limit(3)
        ->get();
    
        // Extract labels and counts from the query result
        $data['labels'] = $queryResult->pluck('name')->toArray();
        $data['counts'] = $queryResult->pluck('count')->toArray();

        // dd($data);

        return response()->json($data);


    //     $statusLabels = Order::getStatusLabels(); // Define this function in your Order model

    //     return response()->json([
    //         'labels' => $statusLabels,
    //         'counts' => $statusCounts->toArray(),
    //     ]);
    }

    public function changeLang(Request $request): RedirectResponse
    {

        $request->validate([
            'lang' => 'required|in:en,id,jp', // Adjust as per your allowed languages
        ]);

        App::setLocale($request->lang);

        $request->session()->put('locale', $request->lang);

        return redirect()->back();

    }


}
