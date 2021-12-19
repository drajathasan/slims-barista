<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2021-12-19 12:18:50
 * @modify date 2021-12-19 12:18:50
 * @license GPLv3
 * @desc [description]
 */

namespace View;

use Zein\Ui\Html\Skeleton;

abstract class Layout
{
    protected string $env = 'dev';

    public function generate()
    {
        global $sysconf;

        // Html Skeleton
        $Html = Skeleton::getInstance($sysconf);

        // Meta
        $Html
            ->setMeta(['charset' => 'utf-8'])
            ->setMeta(['name' => 'viewport', 'content' => 'width=device-width, height=device-height, initial-scale=1'])
            ->setMeta(['http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge'])
            ->setMeta(['http-equiv' => 'Content-Type', 'content' => 'text/html; charset=utf-8'])
            ->setMeta(['http-equiv' => 'Pragma', 'content' => 'no-cache'])
            ->setMeta(['http-equiv' => 'Cache-Control', 'content' => 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0'])
            ->setMeta(['http-equiv' => 'Expires', 'content' => 'Sat, 26 Jul 1997 05:00:00 GMT']);
        
        // Css
        $Html
            ->setLink(['href' => SWB . 'css/bootstrap.min.css?' . date('this'), 'rel' => 'stylesheet', 'type' => 'text/css'])
            ->setLink(['href' => SWB . 'css/core.css?' . date('this'), 'rel' => 'stylesheet', 'type' => 'text/css'])
            ->setLink(['href' => baseUrl('assets/css/custom.css'), 'rel' => 'stylesheet', 'type' => 'text/css']);


        // js
        $Html
            ->setJs(['type' => 'text/javascript', 'src' => baseUrl('assets/js/vue.global.' . ($this->env === 'dev' ? 'js' : 'prod.js')), '', 'bottom'])
            ->setJs(['type' => 'module', 'src' => baseUrl('assets/js/app.js'), '', 'bottom']);

        // Content
        $Html->write($this->content);
    }
}