<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\DonarsModel;
use App\Models\Admin\StudentsModel;
use App\Models\Admin\StudentsDonarsModel;
use App\Models\Admin\EmployeesModel;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DonarsCount = DonarsModel::getActiveOnly()->count();
        $StudentsCount = StudentsModel::getActiveOnly()->count();
        $SponsersCount = StudentsDonarsModel::getActiveOnly()->count();
        $EmployeesCount = EmployeesModel::getActiveOnly()->count();
        return view('home', compact('DonarsCount', 'StudentsCount', 'SponsersCount', 'EmployeesCount'));
    }

}
