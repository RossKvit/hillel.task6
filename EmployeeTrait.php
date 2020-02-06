<?php
trait EmployeeTrait{
    private $name;
    private $salary;
    private $position;
    private $startDate;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }
    public function getName(){
        return $this->name;
    }
    public function getSalary(){
        return $this->salary;
    }
    public function getPosition(){
        return $this->position;
    }
    public function getStartDate(){
        return $this->name;
    }
}