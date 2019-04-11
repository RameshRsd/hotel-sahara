<?php

namespace App\Http\Controllers\server;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServerController extends Controller
{
    protected $serverPath='server';
    protected $pagePath;

    public function __construct()
    {
        $this->data('title',$this->title('admin'));
        $this->data('masterPath',$this->serverPath);
        $this->pagePath= $this->serverPath.'.pages.';
    }
}
