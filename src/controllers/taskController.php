<?php
/**
 * Created by PhpStorm.
 * User: rockwith
 * Date: 12.11.16
 * Time: 19:23
 */

namespace controllers;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use models\task;


class taskController
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
    public function tasksPage(Request $request, Response $response) {
        $content['tasks'] = task::all();
        return $this->ci->renderer->render($response, 'tasks.phtml', $content);
    }


    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function addTask(Request $request, Response $response){
        $data = $request->getParsedBody();
        try{
            task::create($data);
        }catch (\Exception $e){
            $this->ci->logger->warning('addTask exception ' . $e->getMessage());
            $response->getBody()->write("error");
            return $response;
        }
        $response->getBody()->write("ok");
        return $response;
    }


    /**
     * @param $request
     * @param $response
     * @return mixed
     */
    public function rateTask($request, $response){
        $data = $request->getParsedBody();
        try{
            $task = task::find($data['id']);
            $task->rate = $data['rate'];
            $result = $task->save();
        }catch (\Exception $e){
            $this->ci->logger->warning('rateTask exception ' . $e->getMessage());
            $response->getBody()->write("error");
            return $response;
        }
        if ($result){
            $response->getBody()->write("ok");
            return $response;
        }
    }







}