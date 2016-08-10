<?php

namespace App\Http\Controllers;

use App\Video;
use App\Author;
use App\CreditOrder;
use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{

    public $video;
    public $author;
    public $user;
    public $order;

    public function __construct()
    {
        $this->video = new Video();
        $this->order = new CreditOrder();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index')
            ->with('videos', $this->video->all())
            ->with('orders', $this->order->all());
    }
}
