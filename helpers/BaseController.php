<?php

class BaseController
{
    private $action;
    protected $params;

    private $loggedInUser = null;

    function __construct($data) {
        $this->action = $data['action'];
        $this->params = $data['params'];
    }

    protected function currentUser() {
        return $this->loggedInUser;
    }

    public function renderAction()
    {
        header("HTTP/1.1 200 OK");
        echo $this->{$this->action}();
        die;
    }
}

?>

