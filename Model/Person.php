<?php


class Person{
    protected $Id;
    protected $emailAddress;
    protected $phoneNumber;
    protected $firstname;
    protected $lastname;
    protected $gender;
    protected $dateOfBirth;
    protected $nationality;

    function __construct() {
        
    }

    function setId($Id): void {
        $this->Id = $Id;
    }

    function setEmailAddress($emailAddress): void {
        $this->emailAddress = $emailAddress;
    }

    function setPhoneNumber($phoneNumber): void {
        $this->phoneNumber = $phoneNumber;
    }

    function setFirstname($firstname): void {
        $this->firstname = $firstname;
    }

    function setLastname($lastname): void {
        $this->lastname = $lastname;
    }

    function setGender($gender): void {
        $this->gender = $gender;
    }

    function setDateOfBirth($dateOfBirth): void {
        $this->dateOfBirth = $dateOfBirth;
    }

    function setNationality($nationality): void {
        $this->nationality = $nationality;
    }

    function getId() {
        return $this->Id;
    }

    function getEmailAddress() {
        return $this->emailAddress;
    }

    function getPhoneNumber() {
        return $this->phoneNumber;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getGender() {
        return $this->gender;
    }

    function getDateOfBirth() {
        return $this->dateOfBirth;
    }

    function getNationality() {
        return $this->nationality;
    }

}