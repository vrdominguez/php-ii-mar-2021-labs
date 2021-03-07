<?php

namespace Traits;

trait ToString {
    public function getHiddenValues() : array {
        return ["password", "salt"];
    }

    public function __toString() : string {
        $atributes = get_object_vars($this);

        foreach (  $this->getHiddenValues() as $hiddenAtribute ) {
            if ( isset($atributes[$hiddenAtribute]) )
                $atributes[$hiddenAtribute] = '******';
        }

        $ret = '';

        foreach ( $atributes as $key => $value ) {
            $ret .= '- ' . $key . ': ' . $value . PHP_EOL;
        }


        return $ret;
    }
}