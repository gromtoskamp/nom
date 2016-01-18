<?php

class Router_Model_Router extends Core_Model_Object
{

    const INDEX_MODULE = 2;
    const INDEX_CONTROLLER = 3;
    const INDEX_ACTION = 4;
    const INDEX_PARAMS = 5;

    const CONTROLLER = '_Controller_';
    const ACTION = 'action';

    const INDEX = 'index';
    const CORE  = 'Core';
    const NOTFOUND = 'Notfound';

    private $_module;
    private $_controller;
    private $_action;
    private $_params = array();

    /**
     * Parses URL, finds the right controller/action and sends the application off in the right direction.
     */
    public function route()
    {
        $this->parseUrl();

        $this->validateRoute();

        $this->findRoute();
    }

    /**
     * Extracts the Url and gives back the module, controller, action and params.
     */
    public function parseUrl()
    {
        $vars = explode('/', $_SERVER['PHP_SELF']);

        $this->_module      = $vars[2];
        $this->_controller  = $vars[3];
        $this->_action      = $vars[4];

        $params = array_slice($vars, self::INDEX_PARAMS);

        $this->_params      = $params;
    }

    /**
     * Validates that the route is findable. If this is not the case, the user should be redirected to the not found page.
     *
     * @throws Exception
     */
    public function validateRoute()
    {
        if (is_null($this->_module) ||
            is_null($this->_controller))
        {
            $this->getNotFoundPage();
        }

        if (is_null($this->_action)) {
            $this->_action = self::INDEX;
        }

        $this->setClassIdentifier($this->_module . self::CONTROLLER . $this->_controller);
        $this->setIncludePath(Nom::getIncludePath($this->getClassIdentifier()));
    }

    /**
     *
     */
    public function findRoute()
    {
        /** @var Object_Controller_Controller $controller */
        $controller = Nom::getObject($this->classIdentifier, $this->_params, $this->includePath);

        $action = $this->_action . self::ACTION;

        $controller->$action($this->_params);

    }

    /**
     *
     */
    public function getNotFoundPage()
    {
        $this->_module      = self::CORE;
        $this->_controller  = self::NOTFOUND;
    }

}