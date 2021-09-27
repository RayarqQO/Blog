<?php

    namespace application\controllers;

    use application\core\Controller;

    class MainController extends Controller
    {
        public function loginAction()
        {
            $this->view->render('Вход');
        }

        public function logoutAction()
        {
            exit('Выход');
        }

        public function addAction()
        {
            $this->view->render('Добавить пост');
        }

        public function editAction()
        {
            $this->view->render('Редактировать пост');
        }

        public function deleteAction()
        {
            exit('Удаление');
        }
    }