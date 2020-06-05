<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\Api\ApiResponser;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    use ApiResponser;

    public function getColumns($table)
    {       
        $columns = Schema::getColumnListing($table);
        return $columns;
    }
}
