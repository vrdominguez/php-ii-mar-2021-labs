<?php

namespace Base;

use \Base\Errors;

abstract class User implements \Interfaces\Member {
    protected string $userName;
    protected string $password;
    public function __construct( string $userName, string $password = '' ){
        $this->userName = $userName;

        if ( '' != $password )
            $this->setPassword($password);
    }

    // Use diferent algorithm depending on the user type
    public abstract function setPassword( string $password ) : void;
    

    public function login( string $password ) : bool {
        return password_verify( $password, $this->password);
    }

    // Do not return password
    public function __serialize() {
        $atributes = get_object_vars($this);

        unset($atributes['password'] ); // Hide password

        return $atributes;
    }

    public function __toString() {
        $atributes = get_object_vars($this);

        $atributes['password'] = '**********';
        
        $ret = '';

        foreach ( $atributes as $key => $value ) {
            $ret .= '- ' . $key . ': ' . $value . PHP_EOL;
        }


        return $ret;
    }

    // Magic getters and setters
    public function __call(string $method, array $params = [] ) {
        if ( preg_match('/^set(.+)$/', $method, $matches) ) {
            $atribute = lcfirst($matches[1]);

            if ( !count($params) )
                throw new \Exception(sprintf(Errors::ERROR_NEEDS_PARAMS, $method, 1));

            if ( property_exists($this, $atribute) ) {
                $this->$atribute = $params[0];
            }
            else {
                throw new \Exception(sprintf(Errors::ERROR_INEXISTENT_ATRIBUTE, $atribute));
            }
        }
        elseif( preg_match('/^get(.+)$/', $method, $matches) ) {
            $atribute = lcfirst($matches[1]);
            if ( property_exists($this, $atribute) ) {
                return $this->$atribute;
            }
            else {
                throw new \BadFunctionCallException(sprintf(Errors::ERROR_INEXISTENT_ATRIBUTE, $atribute));
            }
        }
        else {
            throw new \BadFunctionCallException(sprintf(Errors::ERROR_INEXISTENT_METHOD, $method));
        }
    }
}
