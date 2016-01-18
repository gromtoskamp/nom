<?php

define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);
define('BP', dirname(__FILE__));
define('RP', dirname(BP));
define('CP', BP . DS . 'code');

include('code/Core/Autoloader/Model/Autoload.php');

final class Nom {

    const BASE_DIR = BP;
    const ROOT_DIR = RP;
    const CODE_DIR = CP;

    const TYPE_MODEL = 'Model';

    const AREA_CORE = 'Core';
    const AREA_LOCAL = 'Local';

    public function __construct()
    {
    }

    public static function Nom()
    {
        $router = Nom::getObject('Router_Model_Router');
        $router->route();
    }

    public static function getConfig()
    {

    }

    public static function getAllModules()
    {

    }

    /**
     * @param      $classIdentifier
     * @param null $arguments
     *
     * @return mixed
     */
    public static function getObject($classIdentifier, $arguments = null, $includePath = null)
    {
        if (!isset($includePath)) {
            $includePath = self::getIncludePath($classIdentifier);
        }

        include_once($includePath);

        return new $classIdentifier($arguments);
    }

    public static function getIncludePath($classIdentifier)
    {
        $basePath = self::CODE_DIR;
        $varPath = self::buildIncludePath($classIdentifier);

        $areas = self::getAllAreas();
        foreach ($areas as $area) {
            if (file_exists($basePath . DS . $area . $varPath)) {
                return $basePath . DS . $area . $varPath;
            }
        }

        return 'File not found';
    }

    public static function buildIncludePath($classIdentifier)
    {
        $includeArray = explode('_', $classIdentifier);
        $module = array_shift($includeArray);
        $type = array_shift($includeArray);

        $includePath  = DS . $module;
        $includePath .= DS . $type;

        foreach ($includeArray as $classItem) {
            $includePath .= DS . $classItem;
        }
        $includePath .= '.php';

        return $includePath;
    }

    private static function getAllAreas()
    {
        return array(
            self::AREA_LOCAL,
            self::AREA_CORE
        );
    }

}