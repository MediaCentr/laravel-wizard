<?php

namespace MediaCentr\LaravelWizard\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use MediaCentr\LaravelWizard\Wizardable;

class WizardController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Wizardable;
}
