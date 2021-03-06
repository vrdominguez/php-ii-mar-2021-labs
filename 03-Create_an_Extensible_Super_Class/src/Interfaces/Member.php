<?php

namespace Interfaces;

interface Member {
    function setPassword( string $password ) : void;
    function login( string $password ) : bool;
}