<?php

namespace Interfaces;

interface MemberInterface {
    function setPassword( string $password ) : void;
    function login( string $password ) : bool;
}