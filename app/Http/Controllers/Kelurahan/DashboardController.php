<?php

namespace App\Http\Controllers\Kelurahan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
      public function index() {
        return view('kelurahan.dashboard');
      }
}
