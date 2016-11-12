<?php
/**
 * Created by PhpStorm.
 * User: rockwith
 * Date: 12.11.16
 * Time: 22:10
 */

namespace middlewares;


use models\user;

class UserInitMW
{
    public function __invoke($request, $response, $next) {
        $user = false;
        if (isset($_SESSION['user_id'])){
            $user = user::find($_SESSION['user_id']);
        }
        $request = $request->withAttribute('user', $user);
        $response = $next($request, $response);
        return $response;
    }
}