<?php

class Character {
    //Attributes
    private $_id='';
    private $_name="";
    private $_strength = 0;
    private $_damage = 0;
    private $_level  = '';
    private $_experience = 0;
    
    //Private static attribute
    private static $_texteDeMenace = 'Je vais vous écraser !!!';
    
    // Getters
    public function id() {
        return $this->_id;
    }
    
    public function name(){
        return $this->_name;
    }
    
    public function experience() {
        return $this -> _experience;
    }
    
    public function damage() {
        return $this -> _damage;
    }
    
    public function level() {
        return $this -> _level;
    }
    
    public function strength() {
        return $this -> _strength;
    }
    
    // Setters
    public function setId($id) {
        $idCast = (int) $id;
        if ($idCast >= 0) {
            $this->_id = $idCast;
        }
        else {
            trigger_error('L\'identifiant doit être un nombre positif. Vérifiez la saisie.', E_USER_WARNING);
        }
    }
    
    public function setName($name) {
        if (is_string($name) AND strlen($name)<20) {
            $this->_name = $name;
        }
    }
    
    public function setStrength($strength){
        $str = (int) $strength;
        if($str > 0) {
            $this->_strength = $str;
        }
    }
    
    public function setLevel($level){
        $lvl = (int) $level;
        if($lvl > 0) {
            $this->_level = $lvl;
        }
        
    }
    
      public function setExperience($experience){
        //Test pour vérifier si le paramètre entier est un entier
        $xp = (int) $experience;
          if($xp>= 0) {
            $this -> _experience = $xp;
          }
    }
    public function setDamage($damage){
        //Test pour vérifier si le paramètre entier est un entier
        if(!is_int($damage) and $damage <= 100) {
            $this -> _damage = $damage;
        }
    }
    
    public static function menacer(){
        echo self::$_texteDeMenace;
    }
    
     //Constructor
    public function __construct($name='', $strength = 0, $damage = 0, $level = 1, $experience = 0) {
        $this->setName($name);
        $this->setStrength($strength);
        $this->setDamage($damage);
        $this->setLevel($level);
        $this->setExperience($experience);
    }
    
    //Methods
    public function move($newlevel) {
        $this->setlevel($newlevel);
        echo $this ->_name.' has moved to '.$this->_level;
    }
    
    public function hit(Character $personnage) {
        $personnage -> _damage += $this -> _strength;
        echo $personnage->_name.' has received '.$this->_damage.' by '.$this->_name;
    }
    
    public function earnExperience() {
        $this->setExperience($this -> _experience++);
        echo $this->_name.' has '.$this->_experience.' experience points.';
    }
    
    public function hydate(array $data) {
        /*
         * Version longue pour hydrater chaque champ un à un
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        
        if (isset($data['name'])) {
            $this->setName($data['name']);
        }
        
        if (isset($data['strength'])) {
            $this->setStrength($data['strength']);
        }
        
        if (isset($data['level'])) {
            $this->setlevel($data['level']);
        }
        
        if (isset($data['damage'])) {
            $this->setDamage($data['damage']);
        }
        
        if (isset($data['experience'])) {
            $this->setExperience($data['experience']);
        }
         * 
         */
        
        //Version plus rapide si tous les champs ne sont pas remplis
        foreach ($data as $key => $value) {
            //Crée une chaine de caractère pour réaliser le nom du setter à appeller "setAttribute"
            $method = 'set'.ucfirst($key);
            
            /* 
             * Si la méthode existe, lance le setter avec la valeur donnée
             * Attention : les contrôles sont déjà réalisés dans les setters
             */
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    
}
