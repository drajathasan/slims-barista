<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2021-12-19 00:10:58
 * @modify date 2021-12-19 00:10:58
 * @license GPLv3
 * @desc [description]
 */

namespace View;

class Pluginlist extends Layout
{
    public static function output(array $Param)
    {
        $Image = baseUrl('assets/images/puzzle-op.png');
        $Static = new static();
        $Static->content = <<<HTML
            <section id="app">
                <barista-nav v-on:change-section="section = 'setting'"></barista-nav>
                <plugin-list v-if="section === 'pluginList'" image-url="{$Image}"></plugin-list>
                <barista-setting v-if="section === 'setting'"></barista-setting>
            </section>
        HTML;
        $Static->generate();
    }
}