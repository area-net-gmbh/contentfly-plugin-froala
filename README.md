# Contentfly Froala Plugin
- **Lizenz**: AGPL v3
- **Contentfly CMS Version**: ab 1.5.0
- **Webseite**: http://www.contentfly-cms.de

## Beschreibung

Plugin zur Integration des Froala Editors als RTE im Contentfly CMS: https://www.froala.com/wysiwyg-editor - der Froala Editor ist kostenpflichtig. Ein entsprechender Lizenz-Key muss pro eingesetzter Domain erworben und hinterlegt werden. Ohne Lizenz-Key kann der Editor für Test-/Evaluierungszwecke genutzt weren. Unabhängig davpn gelten die Lizenzbedingungen von https://www.froala.com/wysiwyg-editor/pricing.

Das Plugin ersetzt alle RTE-Properties mit dem Froala-Editor:

```
/**
 * @ORM\Column(type="text", nullable=true)
 * @PIM\Config(label="Beschreibung")
 * @PIM\RTE()
 */
protected $description;
```

## Installation

Download und Entpacken des Froala-Ordners im plugin-Ordner: _plugins/Froala_

**Registrieren des Plugins in der app.php**
```
$app['pluginManager]->register('Areanet_Froala', 'LIZENZ_KEY');
```

## Konfiguration

Der Froala-Editor kann über die RTE-Annotation angepasst werden:
```
/**
 * @ORM\Column(type="text", nullable=true)
 * @PIM\Config(label="Beschreibung")
 * @PIM\RTE(toolbar='{ "toolbarButtons": ["paragraphFormat", "align", "quote", "|", "bold", "italic", "strikeThrough", "subscript", "superscript", "|",  "formatOL", "formatUL", "outdent", "indent", "|", "insertLink", "-", "specialCharacters", "selectAll", "clearFormatting", "html", "|", "undo", "redo"], "quickInsertButtons": ["table", "ul", "ol", "hr"]}')
 */
protected $description;
```

Siehe https://www.froala.com/wysiwyg-editor/docs/options


# Die Contentfly Plattform ist ein Produkt der AREA-NET GmbH

AREA-NET GmbH
Öschstrasse 33
73072 Donzdorf

**Kontakt**

- Telefon: 0 71 62 / 94 11 40
- Telefax: 0 71 62 / 94 11 18
- http://www.area-net.de
- http://www.app-agentur-bw.de
- http://www.contentfly-cms.de


**Geschäftsführer**
Gaugler Stephan, Köller Holger, Schmid Markus

**Handelsregister**
HRB 541303 Ulm
Sitz der Gesellschaft: Donzdorf
UST-ID: DE208051892




