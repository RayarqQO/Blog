<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;

class MainController extends Controller
{
    public function indexAction()
    {
        $pagination = new Pagination($this->route, $this->model->postsCount(), 1);
        $vars = [
            'pagination' => $pagination->get(),
            'list' => $this->model->postsList($this->route),
        ];
        $this->view->render('Главная страница', $vars);
    }

    public function aboutAction()
    {
        $this->view->render('Обо мне');
    }

    public function contactAction()
    {
        if(!empty($_POST)){
            if(!$this->model->contactValidate($_POST))
            {
                $this->view->message('error', $this->model->error);
            }
            mail('gm8i5@wimsg.com', 'Сообщение из блога', $_POST['name'].','.$_POST['email'].','.$_POST['text']);
            $this->view->message('success', 'Сообщение отправлено администратору');
        }
        $this->view->render('Контакты');
    }

    public function postAction()
    {
        $this->view->render('Пост');
    }
}