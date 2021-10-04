<?php
namespace application\models;

use application\core\Model;

class Admin extends Model
{
    public $error;

    public function loginValidate($post)
    {
        $config = require 'application/config/admin.php';
        if($config['login'] != $post['login'] or $config['password'] != $post['password']){
            $this->error = 'You failed validation';
            return false;
        }

        return true;
    }

    public function postValidate($post, $type)
    {
        $nameLen = iconv_strlen($post['name']);
        $descriptionLen = iconv_strlen($post['description']);
        $textLen = iconv_strlen($post['text']);
        if($nameLen < 3 or $nameLen > 50){
            $this->error = 'Название должно содержать от 3 до 50 символов';
            return false;
        } elseif($descriptionLen < 20 or $descriptionLen > 200){
            $this->error = 'Описание должно содержать от 20 до 200 символов';
            return false;
        } elseif($textLen < 30 or $textLen > 500){
            $this->error = 'Текст должен содержать от 30 до 500 символов';
            return false;
        }

        if($type == 'add' and empty($_FILES['img']['tmp_name']))
        {
            if(empty($_FILES['img']['tmp_name']))
            {
                $this->error = 'Добавьте изображение';
                return false;
            }
        }
        return true;
    }

    public function postAdd($post)
    {
        $params = [
            'id' => null,
            'name' => $post['name'],
            'description' => $post['description'],
            'text' => $post['text']
        ];
        $this->db->query('INSERT INTO posts VALUES (:id, :name, :description, :text)', $params);
        return $this->db->lastInsertId();
    }

    public function postEdit($post, $id)
    {
        $params = [
            'id' => $id,
            'name' => $post['name'],
            'description' => $post['description'],
            'text' => $post['text']
        ];
        $this->db->query('UPDATE posts SET name = :name, description = :description, text = :text WHERE id = :id', $params);
    }

    public function postUploadImage($path, $id)
    {
        move_uploaded_file($path, 'public/materials/'.$id.'.jpg');
    }

    public function isPostExists($id)
    {
        $params = [
            'id' => $id
        ];
        return $this->db->column('SELECT id FROM posts WHERE id = :id', $params);
    }

    public function postDelete($id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM posts WHERE id = :id', $params);
        unlink('public/materials/'.$id.'.jpg');
    }

}