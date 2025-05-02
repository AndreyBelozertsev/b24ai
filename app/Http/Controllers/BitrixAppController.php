<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bitrix24\SDK\Services\ServiceBuilderFactory;
use Bitrix24\SDK\Core\Credentials\ApplicationProfile;

class BitrixAppController extends Controller
{
    public function index(Request $requset){
        //Bitrix init
        $appProfile = ApplicationProfile::initFromArray([
            'BITRIX24_PHP_SDK_APPLICATION_CLIENT_ID' => config('bitrix24.auth.clinet_id'),
            'BITRIX24_PHP_SDK_APPLICATION_CLIENT_SECRET' => config('bitrix24.client_secret'),
            'BITRIX24_PHP_SDK_APPLICATION_SCOPE' => config('bitrix24.scope'),
        ]);
        $B24 = ServiceBuilderFactory::createServiceBuilderFromPlacementRequest(Request::createFromGlobals(), $appProfile);
    }

    public function install(Request $request){
        return view('b24api/install', []);
    }
}
