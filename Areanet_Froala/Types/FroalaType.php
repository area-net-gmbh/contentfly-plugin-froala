<?php
namespace Plugins\Areanet_Froala\Types;

use Areanet\PIM\Classes\Annotations\Rte;
use Areanet\PIM\Classes\Type\PluginType;
use Silex\Application;

class FroalaType extends PluginType
{
    const DEFAULT_TOOLBAR = '{ 
        "toolbarButtons": ["paragraphFormat", "align", "quote", "|", "bold", "italic", "strikeThrough", "subscript", "superscript", "|", "insertTable",  "formatOL", "formatUL", "outdent", "indent", "|", "insertLink", "-", "specialCharacters", "selectAll", "clearFormatting", "html", "|", "undo", "redo"], 
        "quickInsertButtons": ["table", "ul", "ol", "hr"], 
        "tableEditButtons": ["tableHeader", "tableRemove", "|", "tableRows", "tableColumns", "-", "tableCells", "tableCellVerticalAlign", "tableCellHorizontalAlign"],
        "zIndex": 100000
    }';

    protected $key = null;

    public function __construct(Application $app, $key = null)
    {
        parent::__construct($app);
        $this->key = $key;
    }

    public function getPriority()
    {
        return 100;
    }

    public function getAlias()
    {
        return 'froala';
    }

    public function getAnnotationFile()
    {
        return null;
    }

    public function doMatch($propertyAnnotations){
        if(!isset($propertyAnnotations['Areanet\\PIM\\Classes\\Annotations\\Rte'])) {
            return false;
        }

        return true;
    }

    public function processSchema($key, $defaultValue, $propertyAnnotations, $entityName){
        $schema                 = parent::processSchema($key, $defaultValue, $propertyAnnotations, $entityName);
        $propertyAnnotations    = $propertyAnnotations['Areanet\\PIM\\Classes\\Annotations\\Rte'];

        $rteAnno = new Rte(array());

        $schema['rteToolbar']   = $propertyAnnotations->toolbar != $rteAnno->toolbar ? $propertyAnnotations->toolbar : self::DEFAULT_TOOLBAR;
        $schema['dbType']       = "text";
        $schema['froalaKey']    = $this->key;
        
        return $schema;
    }


}
