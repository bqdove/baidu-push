<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-02-23 19:42
 */
namespace Notadd\Baidu\Listeners;

use Notadd\Baidu\Controllers\BaiduController;
use Notadd\Foundation\Routing\Abstracts\RouteRegister as AbstractRouteRegister;

/**
 * Class RouteRegister.
 */
class RouteRegister extends AbstractRouteRegister
{
    /**
     * Handle Route Register.
     */
    public function handle()
    {
        $this->router->group(['middleware' => ['auth:api', 'cross', 'web'], 'prefix' => 'api/baidu'], function () {
            $this->router->post('get', BaiduController::class . '@get');
            $this->router->post('set', BaiduController::class . '@set');
        });
    }
}
