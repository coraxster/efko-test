<?php
/**
 * Created by PhpStorm.
 * User: rockwith
 * Date: 12.11.16
 * Time: 19:23
 */

namespace controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use models\user;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;



class loginController
{
    /**
     * @var
     * контейнер зависимостей
     */
    protected $ci;

    /**
     * taskController constructor.
     * @param $ci
     */
    public function __construct($ci) {
        $this->ci = $ci;
    }


    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function loginPage(Request $request, Response $response) {
        if ($request->getAttribute('user')){
            $response = $response->withRedirect('/');
            return $response;
        }
        return $this->ci->renderer->render($response, 'login.phtml');
    }


    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function loginAction(Request $request, Response $response){
        $data = $request->getParsedBody();
        try{
            $user = user::where([
                    ['username','=',$data['username']],
                    ['password_hash','=',$data['password']],  //todo: нужно поменять на password_hash($data['password'])
                ])->firstOrFail();
            $_SESSION['user_id'] = $user->id;
        }catch (ModelNotFoundException $e){
            $this->ci->logger->info('Wrong password exception. ' . $e->getMessage());
            $content['info'] = 'Пользователь не найден.';
            return $this->ci->renderer->render($response, 'login.phtml', $content);
        }
        $response = $response->withRedirect('/');
        return $response;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function logoutAction(Request $request, Response $response){
        unset($_SESSION['user_id']);
        $response = $response->withRedirect('/login');
        return $response;
    }









}