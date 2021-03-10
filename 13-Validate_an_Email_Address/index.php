<?php

$someEmails = [
    'email@example.com',
    'test+1cv@domain.dot.com',
    'admin@google.com',
    '+bad-email_123@example.org',
];

$emailRegex = "/^[A-Za-z0-9][\w\d\.\+-]*\@[A-Za-z0-9]+((\.|-*)?[A-Za-z0-9])*\.[A-Za-z]{2,20}$/";

foreach ( $someEmails as $email ) {
    $validation = preg_match($emailRegex, $email) ? "CORRECT" : "INCORRECT";
    echo "The adress \"$email\" is $validation" . PHP_EOL;
}