<?php

include_once 'DB.php';

class Treeview {

    private $connection;
    private $DB;
    private $categories;
    private $arrayCat;

    // Перадаем конструктору название таблицы категорий
    public function __construct($categories) {
        $this->categories = $categories;
        $this->DB = DB::getInstance();
        $this->connection = $this->DB->getConnection();

        if ($this->connection) {
            $sql = "set names utf8";
            $this->connection->query($sql);
        }

        $this->arrayCat = $this->getCat();
    }

    //Метод получает массив из таблицы категорий
    public function getCat() {
        $query = "SELECT * FROM $this->categories";
        $result = $this->connection->query($query) or exit(mysqli_error());
        if (!$result) {
            return NULL;
        }
        $arrCat = array();

        $numRows = $result->num_rows;
        if ($numRows != 0) {

            //В цикле формируем массив
            for ($i = 0; $i < $numRows; $i++) {
                $row = $result->fetch_array();

                //Формируем массив, где ключами являются адишники на родительские категории
                if (empty($arrCat[$row['parent_id']])) {
                    $arrCat[$row['parent_id']] = array();
                }
                $arrCat[$row['parent_id']][] = $row;
            }
            //возвращаем массив
            return $arrCat;
        }
    }

    //рекурсивно выводим каталог		
    public function getTree($parentID = 0) {

        //Условия выхода из рекурсии
        if (empty($this->arrayCat[$parentID])) {
            return;
        }

        echo '<ul>';
        for ($i = 0; $i < count($this->arrayCat[$parentID]); $i++) {
            echo '<li class="closed"><a href="#"><span class="file">'
            . $this->arrayCat[$parentID][$i]['name'] . '</span></a>';
            $this->getTree($this->arrayCat[$parentID][$i]['id']);
            echo '</li>';
        }
        echo '</ul>';
    }

}


