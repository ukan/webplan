<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
// use App\Models\Teacher;

class AcademicController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexSchedule()
    {   
        return view('frontend.academic.schedule');
    }
    public function indexMaterial()
    {   
        return view('frontend.academic.material');
    }
    public function indexAcademicSupport()
    {   
        return view('frontend.academic.academicSupport');
    }
}