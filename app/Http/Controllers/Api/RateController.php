<?php

namespace App\Http\Controllers\Api;

use App\Models\Rate;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class RateController extends Controller
{
    use DisableAuthorization;
    protected $model = Rate::class;

}
