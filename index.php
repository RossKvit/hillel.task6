<?php

require_once './EmployeeInterface.php';
require_once './ManagerInterface.php';
require_once './EmployeeTrait.php';
require_once './Worker.php';
require_once './Manager.php';

$manager1 = new Manager();
$manager1->setStartDate('2010-05-15');
$manager1->setName('Petr');
$manager1->setSalary(1000);

$manager2 = new Manager();
$manager2->setStartDate('2017-06-30');
$manager2->setName('Anton');
$manager2->setSalary(1500);

$manager1->addEmployee( new Worker() );
$manager1->addEmployee( new Worker() );
$manager1->addEmployee( new Worker() );

$manager2->addEmployee( new Worker() );
$manager2->addEmployee( new Worker() );
$manager2->addEmployee( new Worker() );


$managers = array(
    'manager1' => [
        'name'   => $manager1->getName(),
        'salary' => $manager1->getSalary(),
        'count_employees' => $manager1->getCountEmployees()
    ],
    'manager2' => [
        'name'   => $manager2->getName(),
        'salary' => $manager2->getSalary(),
        'count_employees' => $manager2->getCountEmployees()
    ],
);

function render( $managers ){
    if( isset($_GET['type'])){
        switch( $_GET['type'] ){
            case 'html':
                renderHtml( $managers );
                break;
            case 'xml':
                renderXml( $managers );
                break;
            case 'json':
                echo json_encode( $managers );
                break;
        }
    }else{
        renderHtml($managers);
    }
}

function renderHtml( $managers ){
    foreach( $managers as $manager ){
        echo '<p><b>Name: </b>'.$manager['name'].'</p>';
        echo '<p><b>Salary: </b>'.$manager['salary'].'</p>';
        echo '<p><b>Count Employees: </b>'.$manager['count_employees'].'</p>';
        echo '<br>';
    }
}

function renderXml( $managers ){
    $xml = new SimpleXMLElement('<root/>');

    foreach( $managers as $manager ){
        array_walk( $manager, function($item, $key) use ( $xml ){
            $xml->addChild("manager", "<$key>$item</$key>" );
        });
    }
    echo $xml->asXML();
}

render( $managers );