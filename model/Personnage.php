<?php

class Personnage {
    //Attributes
    private $_id='';
    private $_name="";
    private $_strength = 0;
    private $_damage = 0;
    private $_experience = 0;
    private $_level  = '';
    
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
        if ($idCast > 0) {
            $this->_id = $idCast;
        }
        else {
            trigger_error('L\'identifiant doit être un nombre positif. Vérifiez la saisie.', E_USER_WARNING);
        }
    }
    
    public function setName($name) {
        if(is_string($name)) {
            $this->_name = $name;
        }
        else {
            trigger_error('Le nom doit être une chaîne de caractères. Vérifiez la saisie', E_USER_WARNING);
        }
    }
    
    public function setStrength($strength){
        $str = (int) $strength;
        if($str <0 or $str >100) {
            trigger_error('La force doit être un nombre entier compris entre 0 et 100. Vérifiez la valeur', E_USER_WARNING);
        }
        else {
            $this->_strength = $str;
        }
    }
    
    public function setLevel($level){
        //Test pour vérifier si le paramètre entier est un entier
        if(!is_string($level)) {
            trigger_error('La level doit être un texte. Saississez une ville non numérique', E_USER_WARNING);
            return;
        }
        else {
            $this -> _level = $level;
        }
    }
    
      public function setExperience($experience){
        //Test pour vérifier si le paramètre entier est un entier
        $xp = (int) $experience;
          if($xp<0 or $xp > 100) {
            trigger_error('L\'expérience doit être un nombre entier inférieur compris entre 0 et 100. Saississez une valeur entière', E_USER_WARNING);
            return;
        }
        else {
            $this -> _experience = $xp;
        }
    }
    public function setDamage($damage){
        //Test pour vérifier si le paramètre entier est un entier
        if(!is_int($damage) and $damage <= 100) {
            trigger_error('L\'expérience doit être un nombre entier inférieur ou égal à 100. Saississez une valeur entière', E_USER_WARNING);
            return;
        }
        else {
            $this -> _damage = $damage;
        }
    }
    
    public static function menacer(){
        echo self::$_texteDeMenace;
    }
    
     //Constructor
    public function __construct($name='', $strength = 0, $level = '', $damage = 0) {
        $this ->setName($name);
        $this -> setStrength($strength);
        $this -> setLevel($level);
        $this -> setDamage($damage);
        $this -> _experience = 0;
    }
    
    //Methods
    public function move($newlevel) {
        $this->setlevel($newlevel);
        echo $this ->_name.' has moved to '.$this->_level;
    }
    
    public function hit(Personnage $personnage) {
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
