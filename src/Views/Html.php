<?php
final class Html
{
    private $header;
    private $footer;
    public function __construct()
    {
        $this->header = "
                        <!DOCTYPE html>
                        <html lang=\"en\">
                        <head>
                        <title>SAU - NubezarTech</title>
                        <meta charset=\"UTF-8\">
                        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                        </head>
                        <body>
                        <a1>Sistema de Acceso Unificado - NubezarTech</a1>
                        ";
        $this->footer = "
                        </body>
                        </html>
                        ";
    }
    public function render($content)
    {
        echo $this->header;
        echo $content;
        echo $this->footer;
    }
}