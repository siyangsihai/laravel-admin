<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Monolog\Handler\SocketHandler;

class SocketServerController extends Controller
{
    //
    public function index(){
        //创建server
        $server = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_set_option($server, SOL_SOCKET, SO_REUSEADDR, 1);//1表示接受所有的数据包
        socket_bind($server, 'http://www.laravel-test.com/server', '80');
        socket_listen($server);
        return $server;
    }

    public function client(){
        return view('socketServer');
    }

}
