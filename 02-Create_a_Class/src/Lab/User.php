<?php

namespace Lab;

class User
{
    protected string $userName;
    protected string $userPassword;
    protected string $email;
    protected string $phoneNumber;

    public function __construct(string $userName, string $userPassowrd) {
        $this->userName     = $userName;
        $this->userPassword = $userPassowrd;
    }

    public function login(string $password = '' ) {
        return ( 0 == strcmp($password, $this->userPassword) ) ? true : false;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function setPhoneNumber(string $phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function getUserData() {
        $data = [
            'userName'     => $this->userName,
            'userPassword' => '********', // Never show real password ;)
        ];

        if ( isset($this->email) && ( 0 != strcmp('', $this->email) ) ) {
            $data['email'] = $this->email;
        }

        if ( isset($this->phoneNumber) && ( 0 != strcmp('', $this->phoneNumber) ) ) {
            $data['phoneNumber'] = $this->phoneNumber;
        }

        return $data;
    }
}