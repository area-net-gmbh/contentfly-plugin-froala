<?php
namespace Plugins\Areanet_Froala;

use Areanet\PIM\Classes\Plugin;
use Plugins\Areanet_Froala\Types\FroalaType;

class FroalaPlugin extends Plugin
{
    public function init(){
        $this->useFrontend();

        $this->registerPluginType(new FroalaType($this->app, $this->options));

        $this->addJSFile('/scripts/froala_editor.pkgd.min.js');
        $this->addJSFile('/scripts/table.min.js');
        $this->addCSSFile('/styles/froala_editor.pkgd.min.css');
        $this->addCSSFile('/styles/froala_style.min.css');
        $this->addCSSFile('/styles/table.min.css');
        $this->addAngularModule('froala', '/scripts/angular-froala.js');

    }
}