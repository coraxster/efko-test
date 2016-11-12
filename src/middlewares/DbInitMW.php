<?php
/**
 * Created by PhpStorm.
 * User: rockwith
 * Date: 12.11.16
 * Time: 22:10
 */

namespace middlewares;


class DbInitMW
{
    protected $ci;

    public function __construct($ci) {
        $this->ci = $ci;
    }

    public function __invoke($request, $response, $next) {
        $this->ci->db;
        $response = $next($request, $response);
        return $response;
    }
}