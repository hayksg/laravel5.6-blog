<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function isPaginationPageExistsInUrl($obj) {
        $total       = $obj->total();
        $perPage     = $obj->perPage();
        $currentPage = $obj->currentPage();
        
        $pagesCount = ceil($total / $perPage);
        
        if ($pagesCount && $currentPage > $pagesCount) {
            return false;
        }
        
        return true;
    }
}
