<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }

    public function loginAction()
    {
        if(isset($_SESSION['admin']))
        {
            $this->view->redirect('admin/add');
        }
        if(!empty($_POST))
        {
            if(!$this->model->loginValidate($_POST))
            {
                $this->view->message('erroe', $this->model->error);
            }
            $_SESSION['admin'] = true;
            $this->view->location('admin/add');
        }
        $this->view->render('Вход');
    }

    public function logoutAction()
    {
        unset($_SESSION['admin']);
        $this->view->redirect('admin/login');
    }

    public function addAction()
    {
        if(!empty($_POST))
        {
            if(!$this->model->postValidate($_POST))
            {
                $this->view->message('error', $this->model->error);
            }
            $this->view->message('success', 'ok');
        }
        $this->view->render('Добавить пост');
    }

    public function editAction()
    {
        if(!empty($_POST))
        {
            if(!$this->model->postValidate($_POST))
            {
                $this->view->message('error', $this->model->error);
            }
            $this->view->message('success', 'ok');
        }
        $this->view->render('Редактировать пост');
    }

    public function deleteAction()
    {
        exit('Удаление');
    }

    public function postsAction()
    {
        $this->view->render('Посты');
    }
}