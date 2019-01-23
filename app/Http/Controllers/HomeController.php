<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Home;
use App\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = Home::where('status', 'active')->orderBy('updated_at', 'desc')->first();
        if ($home == null)
            return view('/cannotAccess', ['error' => 'SYSTEMUPGRADE']);
        $home->users = User::all();
        return view('home', ['home' => $home]);
    }

    public function test()
    {
        return view('/test');
    }

    public function user($id)
    {
        $user = User::find($id);
        if ($user == null)
            return view('/cannotAccess', ['error' => 'NOTFOUND']);
        return view('user', ['user' => $user]);
    }

    public function cannotAccess($error)
    {
        return view('cannotAccess', ['error' => $error]);
    }

    public function exchange()
    {
        $data = $this->exchangeApi('HKD', 'CNY');
        return view('/exchange', ['data' => $data]);
    }

    public function exchangeCalculate(Request $request)
    {
        // dd($request->all());
        $currencyFrom = $request->get('currencyFrom');
        $currencyTo = $request->get('currencyTo');
        $data = $this->exchangeApi($currencyFrom, $currencyTo);
        $retCode = $data['allData']->retCode;
        if ('200' == $retCode)
            return json_encode(['success' => true, 'data' => $data]);
        else
            return json_encode(['success' => false, 'error' => $retCode]);
    }

    private function exchangeApi($currencyFrom, $currencyTo)
    {
        $appkey = ENV('DASHBOARD_MOD_APPKEY', '29da1e3142be0');
        $jsonData = file_get_contents('http://apicloud.mob.com/exchange/code/query?key='.$appkey.'&code='.$currencyFrom.$currencyTo);
        $data = json_decode($jsonData);
        // dd($data);
        $result = $data->result;
        return ['buyPic' => $result->buyPic, 'allData' => $data];
    }
}
