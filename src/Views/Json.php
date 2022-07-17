<?php
namespace SAU_sdk\Views;
final class Json
{
    public static function render($content)
    {
        header('Content-Type: application/json');
        echo json_encode($content);
    }
}