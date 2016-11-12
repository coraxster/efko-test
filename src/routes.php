<?php
// Routes

// Login
$app->get('/login', '')->setName('loginPage');
$app->post('/login', '')->setName('loginAction');

// Tasks
$app->get('/', '')->setName('tasksPage');
$app->post('/add', '')->setName('taskAddAction');
$app->post('/score', '')->setName('taskScoreAction');