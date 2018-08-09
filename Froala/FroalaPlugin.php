<?php
namespace Plugins\Froala;

use Areanet\PIM\Classes\Plugin;
use Plugins\Froala\Types\FroalaType;

class FroalaPlugin extends Plugin
{
    public function init(){
        $this->useFrontend();

        $this->app['typeManager']->registerPluginType(new FroalaType($this->app, $this->options), $this);

        $this->app['uiManager']->addJSFile($this->getFrontendPath().'/scripts/froala_editor.pkgd.min.js');
        $this->app['uiManager']->addCSSFile($this->getFrontendPath().'/styles/froala_editor.pkgd.min.css');
        $this->app['uiManager']->addCSSFile($this->getFrontendPath().'/styles/froala_style.min.css');;
        $this->app['uiManager']->addAngularModule('froala', $this->getFrontendPath().'/scripts/angular-froala.js');
    }
}