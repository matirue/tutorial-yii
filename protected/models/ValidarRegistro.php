<?php

    class ValidarRegistro extends CFormModel{

        public $nombre;

        /** Metodo que valida los parametros */
        public function rules(){

            return array(
                array(
                    'nombre',  //campo solicitado
                    'require', //requiere me dice que nombre es obligatorio
                    'message' => 'Este campo es obligatorio' //mensaje a mostrar en caso de error
                ), //puedo idicar mas parametros de validacion
                array( //indico que valores estan permitidos
                    'nombre',
                    'match',
                    'pattern' => '/^[a-zA-Z\s]+$/',
                    'message' => 'El tipo de dato introducidos es incorrecto'
                ),
                array( //indico la longitud permitida
                    'nombre',
                    'length',
                    'min'=> 5,
                    'tooShort' => 'Minimo de 5 caracteres',
                    'max'=> 50,
                    'tooLong' => 'Maximo de 50 caracteres'
                )
            );
            
        }
        
    }

?>