<?php

namespace Traits;

trait Serialization {
    public array $toHide = [
        "password",
        "salt",
    ];

    // Hide special fileds in serialization
    public function __serialize() : array {
        $atributes = get_object_vars($this);

        foreach (  $this->toHide as $hiddenAtribute ) {
            unset($atributes[$atribute]);
        }

        return $atributes;
    }

    public function __toString() : string {
        $atributes = get_object_vars($this);

        foreach (  $this->toHide as $hiddenAtribute ) {
            unset($atributes[$hiddenAtribute]);
        }

        $ret = '';

        foreach ( $atributes as $key => $value ) {
            $ret .= '- ' . $key . ': ' . $value . PHP_EOL;
        }


        return $ret;
    }

}