<?php

namespace Hametuha\HamPay\Service\GMO\Operation;


use Hametuha\HamPay\Service\GMO\Credential;
use Hametuha\HamPay\Service\GMO\Endpoints;
use Hametuha\HamPay\Util\i18n;

abstract class Common
{

    /**
     * Required params
     *
     * @var array
     */
    protected static $params = [];

    /**
     * Storage
     *
     * @var array
     */
    protected static $storage = [];

    /**
     * Result params
     *
     * @var array
     */
    protected static $result_params = [];

    protected static $entry_point = null;

    /**
     * @param array $params
     * @return array|false
     * @throws \Exception
     */
    public static function exec($params)
    {
        $params = static::preProcess($params);
        $result = Endpoints::getRequest(static::$entry_point, $params, static::$params);
        if (static::$result_params) {
            $result = Endpoints::getSpecifiedParams($result, static::$result_params);
        }
        return static::postProcess($result);
    }

    /**
     * Pre-process params
     *
     * @param array $params
     * @return array
     */
    public static function preProcess($params)
    {
        return $params;
    }

    /**
     * Post-process result
     *
     * @param array $result
     * @return mixed
     */
    public static function postProcess($result)
    {
        return $result;
    }

}
