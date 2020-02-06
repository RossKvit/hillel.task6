<?php
trait EmployeeTrait{
    private $name;
    private $salary;
    private $position;
    private $startDate;
    private $increaseSalaryCof = 0.05;

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param int $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    /**
     * @param string $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate(string $startDate)
    {
        $this->startDate = new DateTime( $startDate );
    }

    public function getName(){
        return $this->name;
    }

    public function getSalary(){
        return $this->salary + $this->getSalaryIncrease( $this->salary );
    }

    public function getSalaryIncrease( int $baseSalary ){
        $salaryIncrease = 0;
        $intervalYears = (int)$this->startDate->diff( new DateTime() )->y;

        if( $intervalYears > 1 ){
            $salaryIncrease = $intervalYears * ( $baseSalary * $this->increaseSalaryCof );
        }

        return $salaryIncrease;
    }

    public function getPosition(){
        return $this->position;
    }

    public function getStartDate():DateTimeInterface
    {
        return $this->startDate;
    }
}