<?php
// Routes

// Login
$app->get('/login', '\controllers\loginController:loginPage')->setName('loginPage');
$app->post('/login', '\controllers\loginController:loginAction')->setName('loginAction');
$app->post('/logout', '\controllers\loginController:logoutAction')->setName('logoutAction');

// Tasks
$app->get('/', '\controllers\taskController:tasksPage')->setName('tasksPage');
$app->post('/add', '\controllers\taskController:addTask')->setName('taskAddAction');
$app->post('/rate', '\controllers\taskController:rateTask')->setName('taskScoreAction');

