<?php
class Db {
    protected $tableName;
    protected $wheres = [];


    public function table($tableName) {
        $this->tableName = $tableName;
        return $this;
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->tableName}";
        if (!empty($this->wheres)) {
            $sql .= " WHERE ";
            foreach ($this->wheres as $value) {
                $sql .= $value['field'] . " = " . $value['value'];
                if ($value != end($this->wheres)) $sql .= " AND ";
            }
            $this->wheres = [];
        }


        return $sql . PHP_EOL;
    }

    public function getOne($id) {
        return "SELECT * FROM {$this->tableName} WHERE id = {$id}" . PHP_EOL;
    }

    public function where($field, $value) {
        $this->wheres[] = [
            'field' => $field,
            'value' => $value
        ];
        return $this;
    }

    public function andwhere($field, $value) {
        return $this->where($field, $value);

    }
}

$db = new Db();
echo $db->table('goods')->getAll() ."<br>";
echo $db->table('goods')->getOne(1) ."<br>";
echo $db->table('user')->where('name', 'admin')->getAll() ."<br>";
echo $db->table('users')->where('login', 'admin')->where('pass', 123)->getAll() ."<br>";
echo $db->table('goods')->where('name', 'чай')->andwhere('price', 12)->getAll() ."<br>";