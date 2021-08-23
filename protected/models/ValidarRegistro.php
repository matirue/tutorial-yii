<?php

    class ValidarRegistro extends CFormModel{ 

        public $nombre; 
        public $apellido;  
        public $sexo;
        public $email;     
        public $password;  
        public $confirmar_password;
        public $terminos;  

        /** Metodo que valida los parametros */
        public function rules(){
            
            /** 
             * primer array
             * nombre campo solicitado
             * requiere me dice que nombre es obligatorio
             * mensaje a mostrar en caso de error    
             * segundo: indico que valores estan permitidos  
             * tercero: indico la longitud permitida
            */
            return array(
                /**Validacion nombre */
                array(
                    'nombre', 
                    'required', 
                    'message' => 'Este campo es obligatorio' ), 
                array(
                    'nombre', 
                    'match', 
                    'pattern' => '/^[a-záéíóúàèìòùñäëïöüÄËÏÖÜ\s]+$/i', 
                    'message' => 'El tipo de dato es incorrecto'),
                array( 
                    'nombre',
                    'length',
                    'min'=> 5, 'tooShort' => 'Minimo de 5 caracteres',
                    'max'=> 50, 'tooLong' => 'Maximo de 50 caracteres'
                ),

                /**Validacion apellido */
                array(
                    'apellido', 
                    'required', 
                    'message' => 'Este campo es obligatorio' ), 
                array(
                    'apellido', 
                    'match', 
                    'pattern' => '/^[a-záéíóúàèìòùñäëïöüÄËÏÖÜ\s]+$/i', 
                    'message' => 'El tipo de dato es incorrecto'),
                array( 
                    'apellido',
                    'length',
                    'min'=> 5, 'tooShort' => 'Minimo de 5 caracteres',
                    'max'=> 50, 'tooLong' => 'Maximo de 50 caracteres'
                ),

                /**Validacion del radioButton sexo */
                array(
                    'sexo', 
                    'required', 
                    'message' => 'Este campo es obligatorio' ), 
                array(
                    'sexo', 
                    'match', 
                    'pattern' => '/^[0-9]/', 
                    'message' => 'El tipo de dato es incorrecto'),

                /**Validacion email */
                array(
                    'email',
                    'required',
                    'message' => 'Este campo es obligatrio'
                ),
                array(
                    'email', 
                    'email', 
                    'message' => 'El formato es incorrecto'),
                array( 
                    'email',
                    'length',
                    'min'=> 8, 'tooShort' => 'Minimo de 8 caracteres',
                    'max'=> 50, 'tooLong' => 'Maximo de 50 caracteres'
                ),

                /**Validacion password */
                array(
                    'password',
                    'required',
                    'message' => 'Este campo es obligatrio'
                ),
                array(
                    'password', 
                    'match', 
                    'pattern' => '/^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i', 
                    'message' => 'Solo letras y numeros'),
                array( 
                    'password',
                    'length',
                    'min'=> 8, 'tooShort' => 'Minimo de 8 caracteres',
                    'max'=> 16, 'tooLong' => 'Maximo de 16 caracteres'
                ),

                /**Validacion confirmar_password comparand con password*/
                array(
                    'confirmar_password',
                    'required',
                    'message' => 'Este campo es obligatrio'
                ),
                array(
                    'confirmar_password',
                    'compare',
                    'compareAttribute' => 'password',
                    'message' => 'No coincide con password'
                ),

                /**Validacion terminos del checkbox*/
                array(
                    'terminos',
                    'required',
                    'message' => 'Debe aceptar los terminos para continuar'
                ),


            );            
        }
        
    }

