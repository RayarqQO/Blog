<?php
namespace application\models;

use application\core\Model;

class Main extends Model
{
    public $error;
    public function getNews()
    {
        $result = $this->db->row('SELECT title, description FROM news');
        return $result;
    }

    public function contactValidate($post)
    {
        $nameLen = iconv_strlen($post['name']);
        $textLen = iconv_strlen($post['text']);
        if($nameLen < 3 or $nameLen > 20){
            $this->error = 'Имя должно содердать от 3 до 20 символов';
            return false;
        } elseif(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
            $this->error = 'Неправильные email. Пример - bob@example.com';
            return false;
        } elseif($textLen < 5 or $textLen > 255){
            $this->error = 'Поле должно содержать от 5 до 255 символов';
            return false;
        }

        return true;
    }

    public function postsCount()
    {
        return $this->db->column('SELECT COUNT(id) FROM posts');
    }

    public function postsList($route)
    {
        $max = 1;
        if(isset($route['page'])){
            $pag = $route['page'];
        }else{
            $pag = 1;
        }
        $params = [
            'max' => $max,
            'start' => (($pag)-1)*$max,
        ];
        return $this->db->row('SELECT * FROM posts ORDER BY id DESC LIMIT :start, :max', $params);
    }
}