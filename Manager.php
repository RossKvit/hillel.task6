<?php
class Manager implements EmployeeInterface, ManagerInterface {
    use EmployeeTrait;

    private $increaseSalaryManagerCof = 0.02;
    private $employees = array();

    public function getEmployees(){
        return $this->employees;
    }

    public function addEmployee(EmployeeInterface $employee){
        $this->employees[] = $employee;
    }

    public function getSalary(){
        return $this->salary + $this->getSalaryIncrease( $this->salary ) + $this->getSalaryManagerIncrease( $this->salary );
    }

    public function getSalaryManagerIncrease( $baseSalary ){
        $salaryIncrease = 0;
        $employeesCounts = $this->getCountEmployees();

        if( $employeesCounts >= 1 ){
            $salaryIncrease = $employeesCounts * ( $baseSalary * $this->increaseSalaryManagerCof );
        }

        return $salaryIncrease;
    }

    public function getCountEmployees(){
        return count( $this->employees );
    }
}