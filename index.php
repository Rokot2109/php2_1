<?php
class Gitars
{
    public $brand;
    public $settings;
    public $price;
    
   
    public function __construct($brand = 'Fender', $settings = 'Electric', $price = 100)
    {
        var_dump("Гитары наше всё, класс " . static::class . " создан! " );
        $this->brand = $brand;
        $this->settings = $settings;
        $this->price = $price;
    }



    public function voice_guitar($combic, $volume) {   
        
        $this->volume = $volume;
        $this->combic = $combic;
        if ($this->volume == 60 && $this->combic == 'Marshal' ){
            echo "Гитара {$this->brand} звучит хорошо, твой звук  {$this->volume} отличный и {$this->combic} кобмик тру!" . "<br>";
        } else {

            echo "Гитара {$this->brand} звучит плохо, твой звук  {$this->volume} плохой и {$this->combic} фиговый кобмик!" . "<br>";
        }

    }

    }

    class BassGitar extends Gitars
    {
        public $class_guitar = self::class;

        public function voice_guitar($combic, $volume, $guitar = ''){
            parent::voice_guitar($combic, $volume, $guitar);
            $this->$guitar = $guitar;
                echo "И это {$guitar}, куда ты пихаешь ее в гитарный комбик ?" . "<br>";
        }
    }

$Gitars1 = new Gitars();
var_dump($Gitars1);
$Gitars1->voice_guitar('Marshal', 60);
$Gitars2 = new BassGitar('Yamaha');
var_dump($Gitars2);
$Gitars2->voice_guitar('Yamaha', 70, 'BassGitar' ) ;


// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x . "<br>";
//     }
// }
// $a1 = new A();
// $a2 = new A();
// $a1->foo();
// $a2->foo();
// $a1->foo();
// $a2->foo();

// Выведет 1234, так как $x статик, при создании нового объекта  она не создается, а при вызове идет инкремент, не важно из какого объекта.

// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x . "<br>";
//     }
// }
// class B extends A {
// }
// $a1 = new A();
// $b1 = new B();
// $a1->foo(); 
// $b1->foo(); 
// $a1->foo(); 
// $b1->foo();

// Выведет 1122, так как $x статик, при создании нового объекта  создается новая статик, а при вызове идет инкремент, вызвали каждый по 2 и получили 1122.

// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x . "<br>";
//     }
// }
// class B extends A {
// }
// $a1 = new A; // без параметров
// $b1 = new B; // без параметров
// $a1->foo(); 
// $b1->foo(); 
// $a1->foo(); 
// $b1->foo(); 

// Выведет 1122, так как $x статик, при создании нового объекта  создается новая статик, а при вызове идет инкремент, вызвали каждый по 2 и получили 1122.