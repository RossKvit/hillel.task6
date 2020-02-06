<?php
interface ManagerInterface{
    public function getEmployees();
    public function addEmploye(EmployeeInterface $employe);
    public function getCountEmployees();
}