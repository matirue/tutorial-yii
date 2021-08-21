<?php

//ACA ESTA TODA LA META-INFORMACION DE LA VISTA

//cambio el titulo de mi pagina
$this->pageTitle = "Paginga de Pruba de la vista";

/**
 * Descripcion
 * registerMetaTag('contenido', nombre);
 */
Yii::app()->clientScript->registerMetaTag(
    'Este es el contenido de la descripcion de PruebaVista',
    'nombreEtiqueta'
);

/**
 * KeyWords
 * registerMetaTag('contenido', nombre);
 */
Yii::app()->clientScript->registerMetaTag(
    'Estas, son, las, palabras, calves',
    'nombreKeyWords'
);

/**
 * Robots
 * registerMetaTag('contenido', nombre);
 */
Yii::app()->clientScript->registerMetaTag(
    'All',
    'nombrerobots'
);

/**
 * Incuyo un arch js
 * registerScriptfile(url del archivo js, posicion de la inclcion )
 *  posiciones:
 * 0 = head -- 1 = body -- 2 = final del body
 */
Yii::app()->clientScript->registerScriptfile(
    Yii::app()->request->baseUrl."/assets/4cf4e571",
    0 
);

/**
 * inclucion de css
 * registerCssFile(ruta del archivo css, atr media)
 */
Yii::app()->clientScript->registerCssFile(
    Yii::app()->request->baseUrl."/css/",
    null
);

?>