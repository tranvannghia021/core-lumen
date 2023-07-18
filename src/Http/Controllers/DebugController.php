<?php

namespace Devtvn\Sociallumen\Http\Controllers;


use Devtvn\Sociallumen\Facades\Social;
use Devtvn\Sociallumen\Helpers\CoreHelper;
use Devtvn\Sociallumen\Helpers\EnumChannel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class DebugController extends Controller
{
    public function test(Request $request){
        $user = Social::driver(EnumChannel::PINTEREST)->setToken("pina_AMATLNAWAAIGMAQAGAAHUDXA67XOBCABQBIQCZJYQABX7ER65ELUI46JM6NARGFRP6EYCBXUBFISBFWP7FVXZCUFPYBKWGIA")->profile();
        dd($user);
        CoreHelper::pusher('forgot_',[
           's'
        ]);

    }

    public function checkDB(Request $request){
        return [
            'redis'=>Redis::connection()->ping('ok'),
            'postgres'=>DB::connection('database_core')->getPdo(),
        ];
    }
}
