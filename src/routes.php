<?php
// Routes

// Login
$app->get('/login', '\controllers\loginController:loginPage')->setName('loginPage');
$app->post('/login', '\controllers\loginController:loginAction')->setName('loginAction');
$app->post('/logout', '\controllers\loginController:logoutAction')->setName('logoutAction');

// Tasks
$app->group('/tasks', function() {
    $this->get('[/]', '\controllers\taskController:tasksPage')->setName('tasksPage');

    $this->post('/add', '\controllers\taskController:addTask')
        ->setName('taskAddAction')
        ->add( new \middlewares\AccessControlMW('user1') );

    $this->post('/rate', '\controllers\taskController:rateTask')
        ->setName('taskScoreAction')
        ->add(new \middlewares\AccessControlMW('user2'));
})->add( new \middlewares\SignInRequireMW() );


