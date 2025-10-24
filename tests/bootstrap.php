<?php
// Autoloader not needed; we'll require files directly in tests.
// Configure session handling for tests
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Define a test double for Connect if not already defined
if (!function_exists('Connect')) {
    function Connect() {
        throw new Exception('Connect() not stubbed in test');
    }
}
