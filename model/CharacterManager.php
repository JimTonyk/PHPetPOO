<?php

class CharacterManager {
    private $_db;

    public function __construct($db) {
        $this -> setDb($db);
    }

    public function setDb(PDO $db) {
        $this ->_db = $db; 
    }

    //CRUD Operations for Characters
    public function create(Character $hero) {
        //TODO: add a Character to DB
        $request = $this->_db->prepare('INSERT INTO characters(heroname, strength, damage, herolevel, experience) VALUES(:heroname, :strength, :damage, :herolevel, :experience)') OR die(print_r($db->errorInfo()));

        $request->execute(array(
            'heroname' => $hero->name(),
            'strength' => $hero->strength(),
            'damage' => $hero->damage(),
            'herolevel' => $hero->level(),
            'experience' => $hero->experience(),
        ));

    }

    public function read($id) {
        //TODO: read a Character using its id as argument
        $id = (int) $id;
       
        $request = $this->_db->prepare('SELECT heroname, strength, damage, herolevel, experience FROM characters WHERE id = ?');
        $hero = $request->execute(array($id));

        return new Character($hero);

    }

    public function readAll() {
        //TODO: read All characters from DB
    }

    public function update(Character $hero) {
        //TODO: modify some parameters of a Character present in DB
    }

    public function delete(Character $hero) {
        //TODO: remove a Character from DB using its id as argument
    }

}