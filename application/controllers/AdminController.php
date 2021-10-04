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
            if(!$this->model->postValidate($_POST, 'add'))
            {
                $this->view->message('error', $this->model->error);
            }
            $id = $this->model->postAdd($_POST);
            if(!$id)
            {
                $this->view->message('Error', 'Error');
            }
            $this->model->postUploadImage($_FILES['img']['tmp_name'], $id);
            $this->view->message('Success', 'Ok');
        }
        $this->view->render('Добавить пост');
    }

    public function editAction()
    {
        if(!$this->model->isPostExists($this->route['id']))
        {
            $this->view->errorCode(404);
        }
        if(!empty($_POST))
        {
            if(!$this->model->postValidate($_POST, 'edit'))
            {
                $this->view->message('error', $this->model->error);
            }
            $this->model->postEdit($_POST, $this->route['id']);
            if ($_FILES['img']['tmp_name'])
            {

                $this->model->postUploadImage($_FILES['img']['tmp_name'], $this->route['id']);
            }
            $this->view->message('success', 'ok');
        }
        $vars = [
            'data' => $this->model->postData($this->route['id'])[0],
        ];
        $this->view->render('Редактировать пост', $vars);
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