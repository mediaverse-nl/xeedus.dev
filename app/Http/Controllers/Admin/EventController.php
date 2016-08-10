<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Log;
use Monolog;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('Showing user profile for user: ');;
//
//        $logger = new Monolog\Logger('general');
//        $app->container->logger = $logger;
//        $app->container->logger->info("Just an INFO message.");


        return view('admin.event.index')->with('log', Log::getMonolog());
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
