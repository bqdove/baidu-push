<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-02-23 19:44
 */
namespace Notadd\Baidu\Controllers;

use Notadd\Baidu\Handlers\ConfigurationHandler;
use Notadd\Foundation\Routing\Abstracts\Controller;

/**
 * Class BaiduController.
 */
class BaiduController extends Controller
{
    /**
     * Configuration handler.
     *
     * @param \Notadd\Baidu\Handlers\ConfigurationHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function configuration(ConfigurationHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
