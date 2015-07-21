<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;

use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;

class HomeController extends Controller
{
	function __construct(){
        $this->middleware('auth', ['only' => ['index', 'store', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view("home.index");
    }

    public function getMessaje(){

        $mensaje = array(
                        array('name' => 'John Smith', 'img'=> '/images/img.jpg', 'time'=> '3 mins ago', 'text'=>'Film festivals used to be do-or-die moments for movie makers. They were where... '),
                        array('name' => 'John Smith', 'img'=> '/images/img.jpg', 'time'=> '3 mins ago', 'text'=>'Film festivals used to be do-or-die moments for movie makers. They were where... '),
                        array('name' => 'John Smith', 'img'=> '/images/img.jpg', 'time'=> '3 mins ago', 'text'=>'Film festivals used to be do-or-die moments for movie makers. They were where... '),
                        array('name' => 'John Smith', 'img'=> '/images/img.jpg', 'time'=> '3 mins ago', 'text'=>'Film festivals used to be do-or-die moments for movie makers. They were where... ')
                    );
        $datos = [$mensaje, count($mensaje)];

        return json_encode($datos);
    }
}
