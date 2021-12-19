<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2021-12-02 12:06:11
 * @modify date 2021-12-02 12:06:11
 * @license GPLv3
 * @desc [description]
 */

if (!function_exists('zdd'))
{
    function zdd($Mix, bool $Close = true)
    {
        echo '<pre>';
        var_dump($Mix);
        echo '</pre>';

        if ($Close) exit;
    }
}

if (!function_exists('callClass'))
{
    function callClass(string $Class, Closure $Callback)
    {
        if (class_exists($Class))
        {
            $Callback($Class);
        }
        else
        {
            echo 'Action not found!';
        }
    }
}

if (!function_exists('moduleName'))
{
    function moduleName()
    {
        return basename(dirname(__FILE__, 2));
    }
}

if (!function_exists('baseUrl'))
{
    function baseUrl(string $AdditionalPath = '')
    {
        return AWB . 'modules/' . moduleName() . '/' . $AdditionalPath;
    }
}