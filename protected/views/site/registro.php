<?php
    
    $this->breadcrumbs=array(
        'Login' =>array('login'),
        'Registro',
    );
?>


<div>
    <?php echo '<h4>' . $mensaje . '</h4>'; ?>
</div>



<div class='form'>

    <?php
        /**beginWidget => es el apertura del formulario NECESITA QUE SE CIERRE AL FINAL
        *CActiveForm proporciona los metodos que voy a poder usar
        * method = tipo de metodo 
        * action = url donde quiero que trabaje (en esta vista )
        * id para realizar chequeos, etc
        * enableAjaxValidation activo las opciones de ajax
        * enableClientValidation = esta propieda hace que sea validado del lado del cliente
        * clientOptions = conjunto de validaciones que funcionan segun los ventos indicados
         *    validateOnSubmit = click boton
         *    validateOnChange = cambio de foco
         *    validateOnType = cuando tiene el foco
        */
        $form = $this->beginWidget('CActiveForm', array(
            'method' => 'POST',                                      
            'action' => Yii::app()->createUrl('site/registro'), 
            'id' => 'form',    
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,                       
            'clientOptions' => array(                               
                'validateOnSubmit' => true,                                 
                'validateOnChange' => true,                             
                'validateOnType' => true,                                   
            ),
        ));
    ?>

    <div class="row">
        <?php
            //IMPORTANTE que el atributo sea el mismo
            echo $form->labelEx($model, 'nombre');
            echo $form->textField($model, 'nombre');
            echo $form->error($model, 'nombre');

        ?>
    </div>

    <div class="row">
        <?php
            echo $form->labelEx($model, 'apellido');
            echo $form->textField($model, 'apellido');
            echo $form->error($model, 'apellido');
        ?>
    </div>

    <div class="row">
        <?php
            echo $form->labelEx($model, 'sexo');
            echo $form->radioButtonList(
                        $model, 
                        'sexo',                        
                        array('1' => 'Hombre', '2' => 'Mujer'),
                        array(
                            'labelOptions' => array('style'=>'display:inline'),
                            'separator' => '<br>',
                            'template' => '{label}: {input}',                    
                        )
                    );                        
        ?>
    </div>

    <br>

    <div class="row">
        <?php
            echo $form->labelEx($model, 'email');
            echo $form->textField($model, 'email');
            echo $form->error($model, 'email');
        ?>
    </div>

    <div class="row">
        <?php
            echo $form->labelEx($model, 'password');
            echo $form->passwordField($model, 'password');
            echo $form->error($model, 'password');
        ?>
    </div>

    <div class="row">
        <?php
            echo $form->labelEx($model, 'confirmar_password');
            echo $form->passwordField($model, 'confirmar_password');
            echo $form->error($model, 'confirmar_password');
        ?>
    </div>

    <div class="row">
        <?php
            echo $form->labelEx($model, 'terminos', array('style' =>'display:inline'));
            echo $form->checkBox($model, 'terminos');
            echo $form->error($model, 'terminos');
        ?>
    </div>

    
    <?php
        //captcha
        if(CCaptcha::checkRequirements()): //compruebo si las extensiones del captcha esta disponible
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'captcha'); ?>

        <!--div class="hint">
            Introducir el texto que ve en la imagen.
        </div-->

        <div>
            <?php 
                // CCaptcha: cargo el captcha
                //array: coloco imagen con un boton para actualizar al captcha
                $this->widget(
                    "CCaptcha",
                    array(
                        'buttonType' => 'button',
                        'buttonOptions' => array(
                                'type' => 'image',
                                'src' => 'images/actualizar.png',
                                'style' => 'width: 2%; height: auto'
                                )
                        )
                ); 
            ?>
            <br>
            <?php echo $form->textField($model, 'captcha') ?>
        </div>

        

        <?php echo $form->error($model, 'captcha') ?>

    </div>

    
    <?php endif; ?> <!--corto el captcha-->

    <div class="row">
        <?php
            //butoon
            Echo CHtml::submitButton('Registrarme');
        ?>
    </div>

    

    <?php
       //CERRANDO EL WIDGET  
        $this->endWidget();
    ?>
</div>




