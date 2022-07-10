<?php
final class Json
{
    public function render($content)
    {
        header('Content-Type: application/json');
        echo json_encode($content);
    }
}