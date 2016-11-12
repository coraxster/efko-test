<?php
/**
 * Created by PhpStorm.
 * User: rockwith
 * Date: 12.11.16
 * Time: 22:10
 */

namespace middlewares;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


class AccessControlMW
{
    protected $role;

    public function __construct($role) {
        $this->role = $role;
    }

    public function __invoke(Request $request, Response $response, $next) {
        $user = $request->getAttribute('user');

        if ($user->role <> $this->role){
            return $response->withStatus(405);
        }
        $response = $next($request, $response);
        return $response;
    }
}