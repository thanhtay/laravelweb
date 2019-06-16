<?php

class Common
{

}



// Factoty design patten
interface InterfaceCommon
{

}

abstract class AbstractCommon extends Common
{

}

class Abstract2 extends AbstractCommon implements InterfaceCommon
{

}
// Cannot instantiate interface Interface
// $a = new InterfaceCommon();
// Cannot instantiate abstract class AbstractCommon
// $a = new AbstractCommon();
$a = new Abstract2();


// Prototype design patten
class PrototypeTest
{
    public $property1;
    public $property2;
    
}
class Prototype
{
    public $property1;
    public $property2;
    
    public function __construct()
    {
    }
}

$test = new PrototypeTest();
$test->property1 = 'test';
$prt1 = new Prototype();
$prt1->property1 = $test;
$prt1->property2 = "abc";

$prt2 = clone $prt1;
$prt3 = $prt1;

// shallow copy
$prt3->property1->property1 = '2';

// d($prt1);
// d($prt2);
// dd($prt3);

class Prototype1
{
    public $property1;
    public $property2;
    
    public function __construct()
    {
        $this->property1 = new PrototypeTest();
    }

    public function __clone()
    {
        // deep copy. just for the class include property value
        $this->property1 = clone $this->property1;
    }
}

$prt5 = new Prototype1();
$prt5->property1->property1 = '1';

$prt6 = clone $prt5;
$prt6->property1->property1 = '2';

// d($prt5);
// dd($prt6);

// Builder
// to instantiate a object which is so complex
// which multiple data is a object
interface BuilderInterFace
{
    public function createVehicle();
    public function addDoors();
    public function getVehicle();
}

class TruckBuilder implements BuilderInterFace
{
    /**
     * @var Object
     */
    private $truck;
    public function addDoors()
    {
        $this->truck->setPart('rightDoor', new Door());
        $this->truck->setPart('lefttDoor', new Door());
        $this->truck->setPart('trunkLid', new Door());

    }
    public function createVehicle()
    {
        $this->truck = new Truck();
    }

    public function getVehicle()
    {
        return $this->truck;
    }
}

class CarBuilder implements BuilderInterFace
{
    /**
     * @var Object
     */
    private $car;
    public function addDoors()
    {
        $this->car->setPart('rightDoor', new Door());
        $this->car->setPart('lefttDoor', new Door());
    }
    
    public function createVehicle()
    {
        $this->car = new Car();
    }
    public function getVehicle()
    {
        return $this->car;
    }
}

abstract class Vehicle{
    /**
     * @var [object]
     */
    private $data = [];
    /**
     * Set Data
     * @param string $key 
     * @param object $val 
     */
    public function setPart($key, $val)
    {
        $this->data[$key] = $val;
    }
    public function getPart()
    {
        return $this->data;
    }
}

class Truck extends Vehicle
{
}

class Car extends Vehicle
{
}

class Door
{
}

class Directer
{
    public function build(BuilderInterFace $build)
    {
        $build->createVehicle();
        $build->addDoors();
        return $build->getVehicle();
    }
}
$car = new CarBuilder();
$object = (new Directer())->build($car);

$truck = new TruckBuilder();
$object1 = (new Directer())->build($truck);

// d($object);
// dd($object1);

// Singleton
// To instantiate a only one object
class DB
{
    private $host = 'localhost';
    private $database = 'hoctap';
    private $username = 'root';
    private $password = '';

    private static $db = null;

    public $sql;
    private function __construct()
    {  
        try {
            $this->_connection = new PDO(
                "mysql:host=$this->host;dbname=$this->database",
                $this->username,
                $this->password
            );
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public static function getDb()
    {
        if (self::$db == null) {
            self::$db = new self();
            echo "Set db <br>";
        } else {
            echo "Get db <br>";
        }
        return self::$db;
    }

    // Get mysqli connection
	public function getConnection() {
		return $this->_connection;
    }

}

$db = DB::getDb();
$sql_query = "SELECT id, name FROM subjects";
$pdo = $db->getConnection();
// $data = $pdo->prepare($sql_query)->execute();
$pdo = null;
// sleep(5);
// dd($data);

// $pdo = $db->getConnection();
// $stmt = $pdo->prepare($sql_query);
// $stmt->execute(); 
// $data = $stmt->fetchAll();
// dd($data);

// $result = $pdo->prepare($sql_query);
// $result->execute();
// dd($result);

/*  Structure Design Pattern
    link the other object
 */
// Adapter
class Mission
{
    public function work()
    {
    }
}
class Task
{
    public function doTask()
    {
        return "Development a web.";
    }
}

class Adapter extends Mission
{
    private $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function work()
    {
        return $this->task->doTask();
    }
}

$adapter = new Adapter(new Task());

// Bring
// Link interface and abstract class by concrete object
// Or split interface and abstract into concrete object

abstract class AbstractA
{
    protected $implementation;

    public function __construct(ImplementationA $implementation)
    {
        $this->implementation = $implementation;
    }

    public abstract function operation();
}

class ConcreateAbstractA extends AbstractA
{
    public function operation()
    {
        return $this->implementation->operationImplementation();
    }
}

interface ImplementationA
{
    public function operationImplementation();
}

class ConcreteImplementationA implements ImplementationA
{
    public function operationImplementation()
    {
        return "ConcreteImplementationA: Here's the result on the platform A.\n";
    }
}

class ConcreteImplementationB implements ImplementationA
{
    public function operationImplementation()
    {
        return "ConcreteImplementationB: Here's the result on the platform B.\n";
    }
}

// $implementation = new ConcreteImplementationA;
// $abstraction = new ConcreateAbstractA($implementation);
// dd($abstraction->operation());

// Decorator
// To extends a class flexibly(dynamically) without changing its properties 
interface OperationImplement
{
    public function doIt();
}

class Pizza1 implements OperationImplement
{
    public function doIt()
    {
        return 'Pizza 1';
    }
}

class Pizza2 implements OperationImplement
{
    public function doIt()
    {
        return 'Pizza 2';
    }
}

abstract class Decorator implements OperationImplement
{
    public $pizza;

    public function __construct(OperationImplement $pizza)
    {
        $this->pizza = $pizza;
    }

    public function doIt()
    {
        return $this->pizza->doIt();
    }
}

class PizzaADecorator extends Decorator
{
    public function doIt()
    {
        return $this->pizza->doIt() . ' & A';
    }
}

class PizzaBDecorator extends Decorator
{
    public function doIt()
    {
        return $this->pizza->doIt() . ' & B';
    }
}

// $pizza1 = new Pizza1();
// $pizza2 = new Pizza2();

// d($pizza1->doIt());
// d($pizza2->doIt());

// $pizzaA1 = new PizzaADecorator($pizza1);
// $pizzaA2 = new PizzaADecorator($pizza2);

// d($pizzaA1->doIt());
// dd($pizzaA2->doIt());

// Facade
// To list the actives for action orderly 

class Do1
{
    public function do()
    {
        return 'Do1 done.';
    }
}

class Do2
{
    public function do()
    {
        return 'Do2 done.';
    }
}

class Do3
{
    public function do()
    {
        return 'Do2 done.';
    }
}

class DoAllFacede implements OperationImplement
{
    public function doIt()
    {
        echo $this->work1();
        echo $this->work2();
        echo $this->work3();
    }

    private function work1()
    {
        $do = new Do1();
        return $do->do();
    }

    private function work2()
    {
        $do = new Do2();
        return $do->do();
    }

    private function work3()
    {
        $do = new Do3();
        return $do->do();
    }
}
// $facede = new DoAllFacede();
// dd($facede->doIt());

// Proxy
// To serve lazy loading(to delay initializing the object untill used)

class User implements OperationImplement
{
    public $id;
    public $name;

    public function __construct()
    {
        $this->id = 1;
        $this->name = 'name test';
    }
    public function doIt()
    {
        return 'id user: ' . $this->id . ' name:' . $this->name;
    }
}

class Proxy implements OperationImplement
{
    public $user;
    public function __construct($user = null)
    {
        if ($user) {
            $this->user = $user;
        }
    }
    public function doIt()
    {
        if($this->checkRealUser()) {
            return $this->user->doIt();
        } else {
            return 'Waiting user';
        }
    }

    private function checkRealUser()
    {
        return $this->user instanceof User;
    }
}

$proxy1 = new Proxy();
d($proxy1->doIt());

$proxy2 = new Proxy(new User());
dd($proxy2->doIt());