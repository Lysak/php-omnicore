<?php

namespace components;

/**
 * Class Helpers
 * @package components
 */
class Helpers
{
    const HTTP_OK = 200;
    const HTTP_BAD_REQUEST = 400;

    /**
     * @param int $status
     * @param array $error
     * @return bool
     */
    public static function response($status = self::HTTP_OK, $error = []): bool
    {
        if (is_string($error)) {
            $error = (array)$error;
        }
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($error);
        return $status === self::HTTP_OK;
    }
}