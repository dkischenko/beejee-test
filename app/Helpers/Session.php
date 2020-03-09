<?php

namespace App\Helpers;

/**
 * Class Session
 * @package App\Helpers
 */
class Session
{
    /**
     * Start session
     */
    public static function startSession()
    {
        session_start();
    }

    /**
     * Create CSRF token for forms
     * @param int $length
     */
    public static function createCSRF(): void
    {
        $_SESSION['token'] = $_SESSION['token'] ?? bin2hex(random_bytes(32));
    }

    /**
     * Get CSRF token
     * @return string
     */
    public static function getCSRF(): string
    {
        return $_SESSION['token'] ?? '';
    }

    /**
     * Finish session
     * @return void
     */
    public static function endSession(): void
    {
        session_abort();
    }
}
