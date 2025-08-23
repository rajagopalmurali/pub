<?php

use Jenssegers\Blade\Blade;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Carbon\Carbon;

class Site extends BaseController
{
    public function home()
    {
        $data['userData'] = array();
        $blade = new Blade(array('modules/site/views'), 'cache');
        echo $blade->make("static/home", $data)->render();
        die;
    }
}

(new Site($this->sharedData()))->renderAction();
