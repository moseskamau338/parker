<?php

namespace App\Http\Controllers\Api;

use App\Models\Gateway;
use Illuminate\Http\Request;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller;

class GatewayController extends Controller
{
    use DisableAuthorization;
    protected $model = Gateway::class;
}
