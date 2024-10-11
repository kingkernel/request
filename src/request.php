<?php

namespace Kingkernel;
/**
 * @describe: 
 */
class Request 
{
    public $verb;
    public function  __construct()
    {
        $this->verb = $_SERVER['REQUEST_METHOD'];
    }
    /**
     * @describe: return http verb
     * @param void
     * @return string 
     * @author: Daniel Hogans
     * @email: daniel.santos.ap@gmail.com
     */
    public static function getVerb() : string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    /**
     * @describe: return array with url params
     * @param void
     * @return array 
     * @author: Daniel Hogans
     * @email: daniel.santos.ap@gmail.com
     */
    public static function getParams() : array
    {
        $strQueryString = explode('&', $_SERVER['QUERY_STRING']);
        $arrUrlParams = [];
        foreach ($strQueryString as $value) {
            $arrUrlParams[explode('=', $value)[0]] = explode('=', $value)[1];
        }
        return $arrUrlParams;
    }
    /**
     * @describe: return array with url params
     * @param string chave/indicador do campo que gostaria de pegar os dados
     * @return mixed 
     * @author: Daniel Hogans
     * @email: daniel.santos.ap@gmail.com
     */
    public static function getInParams(string $paramName)
    {
        $arrParams = [];
        foreach (self::getParams() as $arrayItem) {
            $arrParams[explode('=', $arrayItem)[0]] = explode('=', $arrayItem)[1];
        }
        if (array_key_exists($paramName, $arrParams)) {
            return $arrParams[$paramName];
        }
        return null;
    }
    /**
     * @describe: return HTTP verb
     * @param void
     * @return string
     * @author: Daniel Hogans
     * @email: daniel.santos.ap@gmail.com
     */
    public static function getVerbMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
print_r(Request::getVerbMethod());