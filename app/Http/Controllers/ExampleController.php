<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController as RC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExampleController extends RC {

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function index() {
        $result = Some_Model::where('enabled', '=', true)->get();
        return $this->sendResponse($result, "ok", 200);
    }

    //
}
