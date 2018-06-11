<?php

class Personnage {
    //Attributes
    private $_force = 0;
    private $_localisation  = '';
    private $_experience = 0;
    private $_degats = 0;
    
    //Static attributes
    const FORCE_PETITE = 25;
    const FORCE_MOYENNE = 50;
    const FORCE_GRANDE = 75;

    
    // Getters
    public function experience() {
        return $this -> _experience;
    }
    
    public function degats() {
        return $this -> _degats;
    }
    
    public function localisation() {
        return $this -> _localisation;
    }
    
    public function force() {
        return $this -> _force;
    }
    
    // Setters
    public function setForce($force){
        
        if(in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE])) {
            $this -> _force = $force;
        }
    }
    
    public function setLocalisation($localisation){
        //Test pour vérifier si le paramètre entier est un entier
        if(!is_string($localisation)) {
            trigger_error('La localisation doit être un texte. Saississez une ville non numérique', E_USER_WARNING);
            return;
        }
        else {
            $this -> _localisation = $localisation;
        }
    }
    
      public function setExperience($experience){
        //Test pour vérifier si le paramètre entier est un entier
        if(!is_int($experience) and $experience <= 100) {
            trigger_error('L\'expérience doit être un nombre entier inférieur ou égal à 100. Saississez une valeur entière', E_USER_WARNING);
            return;
        }
        else {
            $this -> _experience = $experience;
        }
    }
    public function setDegats($degats){
        //Test pour vérifier si le paramètre entier est un entier
        if(!is_int($degats) and $degats <= 100) {
            trigger_error('L\'expérience doit être un nombre entier inférieur ou égal à 100. Saississez une valeur entière', E_USER_WARNING);
            return;
        }
        else {
            $this -> _degats = $degats;
        }
    }
    
     //Constructor
    public function __construct($force = 0, $localisation = '', $degats = 0) {
        $this -> setForce($force);
        $this -> setLocalisation($localisation);
        $this -> setDegats($degats);
        $this -> _experience = 0;
    }
    
    //Methods
    public function deplacer() {
        
    }
    
    public function frapper(Personnage $personnage) {
        $personnage -> _degats += $this -> _force;
    }
    
    public function gagnerExperience() {
        $this -> _experience += 1;
    }
    
}
