<?php

class BasePage extends Component
{

    private $url_css = BASE_URL . '/css/style.css';
    private $document_title = 'GET DOCUMENT TITLE';

    public function __construct($children)
    {
        parent::__construct($children);
    }

    protected function render()
    { ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="<?php echo $this->url_css; ?>">
            <title><?php echo $this->document_title; ?></title>
        </head>
        <body>
        <?php
        Component::mount([
            new Header([]),
            new Main([]),
            new Footer([]),
        ]);
        ?>
        <script>

        </script>
        </body>
        </html>
        <?php ;
    }
}