<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-02-23 19:44
 */
namespace Notadd\Baidu\Controllers;

use Notadd\Baidu\Handlers\GetHandler;
use Notadd\Baidu\Handlers\SetHandler;
use Notadd\Foundation\Routing\Abstracts\Controller;

/**
 * Class BaiduController.
 */
class BaiduController extends Controller
{
    /**
     * Get handler.
     *
     * @param \Notadd\Baidu\Handlers\GetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function get(GetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Set handler.
     *
     * @param \Notadd\Baidu\Handlers\SetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function set(SetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
