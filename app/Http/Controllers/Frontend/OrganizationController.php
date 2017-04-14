<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Teacher;

class OrganizationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexCenter()
    {   
        return view('frontend.organization.center');
    }

    public function indexRegion()
    {   
        // return view('frontend.profile_pesaantren.history');
    }
}