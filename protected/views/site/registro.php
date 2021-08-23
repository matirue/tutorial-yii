<div class='form'>
    <?php
        //beginWidget => es el apertura del formulario NECESITA QUE SE CIERRE AL FINAL
        //CActiveForm proporciona los metodos que voy a poder usar
        // method = tipo de metodo 
        // action = url donde quiero que trabaje (en esta vista )
        // enableClientValidation = esta propieda hace que sea validado del lado del cliente
        // clientOptions = conjunto de validaciones que funcionan segun los ventos indicados
         //    validateOnSubmit = click boton
         //    validateOnChange = cambio de foco
         //    validateOnType = cuando tiene el foco
        $form = $this->beginWidget('CActiveForm', array(
            'method' => 'POST',                                      
            'action' => Yii::app()->createUrl('site/registro'),     
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




