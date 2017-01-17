<?php
/**
 * PHP version 7
 *
 * @package   KISSREST
 * @author    Gabriel Prieto <levitarmouse@gmail.com>
 * @copyright 2017 Levitarmouse
 * @link      coming soon
 */

namespace levitarmouse\rest;

class RequestParams
{
    protected $params;

    public function __construct($data, $method = '')
    {
        if ($method == 'GET') {
            $querystring = $data;

//            if (isset($querystring['params'])) {
//                if (is_string($querystring['params'])) {
                if (is_string($querystring)) {
                    $data = json_decode($querystring['params']);
                }
//            }
        }

//        $params = new \levitarmouse\core\Object();
        $params = new \levitarmouse\core\SmartObject();
        if (is_array($data) || is_object($data)) {
            $params = $params->analize($data);
//            foreach ($data as $key => $value) {
//                $params->$key = $value;
//            }
        }
        $this->params = $params;
    }

    public function getParams($method = '') {

        return $this->params;
    }
}