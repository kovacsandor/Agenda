<?php

class BasePage extends Component
{
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
            <link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon">
            <link rel="stylesheet" href="<?php echo URL_STYLESHEET ?>">
            <title><?php echo $this->getDocumentTitle() ?></title>
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

    public function getDocumentTitle()
    {
        $basename = basename($_SERVER['PHP_SELF']);
        switch ($basename) {
            case PAGE_404:
                $result = LABEL_PAGE_404;
                break;
            case PAGE_DUTY:
                $result = LABEL_PAGE_ADD;
                break;
            case PAGE_DUTY_LIST:
                $result = LABEL_PAGE_DUTIES;
                break;
            case PAGE_HOME:
                $result = LABEL_PAGE_HOME;
                break;
            case PAGE_LOGIN:
                $result = LABEL_PAGE_LOGIN;
                break;
            case PAGE_REGISTRATION:
                $result = LABEL_PAGE_REGISTRATION;
                break;
            case PAGE_LOG_OUT:
                $result = '';
                break;
            default:
                throw new Exception('Unregistered page: ' . $basename);
        }
        return $result;
    }
}