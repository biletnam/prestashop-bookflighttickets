<?php
class ReservationDetails extends ObjectModel
{   
    public $id_reservationdetails; //	int(11)			Nee	Geen	AUTO_INCREMENT	 Veranderen Veranderen	 Verwijderen Verwijderen	 Meer Geef meer acties weer
    public $id_cart;
    public $gender; //	enum('Male', 'Female')	utf8_general_ci		Nee	Geen		 Veranderen Veranderen	 Verwijderen Verwijderen	 Meer Geef meer acties weer
    public $firstname; //	varchar(255)	utf8_general_ci		Nee	Geen		 Veranderen Veranderen	 Verwijderen Verwijderen	 Meer Geef meer acties weer
    public $surname; //	varchar(255)	utf8_general_ci		Nee	Geen		 Veranderen Veranderen	 Verwijderen Verwijderen	 Meer Geef meer acties weer
    public $birthdate; //	date			Nee	Geen		 Veranderen Veranderen	 Verwijderen Verwijderen	 Meer Geef meer acties weer
    public $email; //	varchar(255)	utf8_general_ci		Nee	Geen		 Veranderen Veranderen	 Verwijderen Verwijderen	 Meer Geef meer acties weer
    public $phone; //	varchar(20)	utf8_general_ci		Nee	Geen		 Veranderen Veranderen	 Verwijderen Verwijderen	 Meer Geef meer acties weer
    public $adress; //	varchar(200)	utf8_general_ci		Nee	Geen		 Veranderen Veranderen	 Verwijderen Verwijderen	 Meer Geef meer acties weer
    public $postalcode; //	varchar(20)	utf8_general_ci		Nee	Geen		 Veranderen Veranderen	 Verwijderen Verwijderen	 Meer Geef meer acties weer
    public $place; //	varchar(255)	utf8_general_ci		Nee	Geen		 Veranderen Veranderen	 Verwijderen Verwijderen	 Meer Geef meer acties weer
    public $country; //	varchar(255)	utf8_general_ci		Nee	Geen		 Veranderen Veranderen	 Verwijderen Verwijderen	 Meer Geef meer acties weer
    public $modified; //	timestamp		on update CURRENT_TIMESTAMP	Nee	CURRENT_TIMESTAMP	ON UPDATE CURRENT_TIMESTAMP	 Veranderen Veranderen	 Verwijderen Verwijderen	 Meer Geef meer acties weer
    public $created; //
    
    
    
    
    public static $definition = array(
        'table' => 'booking_reservationdetails',
        'primary' => 'id_reservationdetails',
        'multilang' => false,
    
        'fields' => array(
            'id_reservationdetails' => array(
                'type' => self::TYPE_INT,
            ),
            'id_cart' => array(
                'type' => self::TYPE_INT,
            ),
            'id_schedule' => array(
                'type' => self::TYPE_INT,
            ),
            'gender' => array(
                'type' => self::TYPE_STRING,
                'size' =>10,
            ),
            'firstname' => array(
                'type' => self::TYPE_STRING,
                'size'=>255,
            ),
            'surname' => array(
                'type' => self::TYPE_STRING,
                'size' => 255,
            ),
            'birthdate' => array(
                'type' => self::TYPE_DATE,
            ),
            'email' => array(
                'type' => self::TYPE_STRING,
                'size'=>255,
            ),
            'phone' => array(
                'type' => self::TYPE_STRING,
                'size'=>20,
            ),
            'adress' => array(
                'type' => self::TYPE_STRING,
                'size'=>200,
            ),            
            'postalcode' => array(
                'type' => self::TYPE_STRING,
                'size'=>20,
            ),
            'place' => array(
                'type' => self::TYPE_STRING,
                'size'=>255,
            ),
            'country' => array(
                'type' => self::TYPE_STRING,
                'size'=>255,
            ),
            'modified' => array(
                'type' => self::TYPE_DATE
            ),
            'created' => array(
                'type' => self::TYPE_DATE
            ),
        ),
    );
   
    public function add($autodate = true, $null_values = false)
    {
        $this->created = date('Y-m-d H:i:s');
        $this->modified = date('Y-m-d H:i:s');
    
        return parent::add($autodate, $null_values);
    }
    
    public function update($null_values = false)
    {
        $this->modified = date('Y-m-d H:i:s');
        return parent::update($null_values);
    }
    
    public static function alreadyExists($id_cart, Array $person) 
    {
        $sql = sprintf('SELECT COUNT(*) t FROM '._DB_PREFIX_.'booking_reservationdetails WHERE 
            id_cart=%d AND firstname = "%s" AND surname="%s" AND postalcode = "%s" AND birthdate = "%d-%d-%d"',
            $id_cart,
            $person['firstname'],
            $person['lastname'],
            $person['postalcode'],
            $person['years'],
            $person['months'],
            $person['days']
            
        );
        return Db::getInstance()->getValue($sql);
    }
}