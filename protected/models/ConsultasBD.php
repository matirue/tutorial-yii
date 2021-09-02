<?php

    class ConsultasBD{

        //prorp para el codigo de verificacion
        public $codigo_verificacion;

        public function guardar_usuario($nombre, $apellido, $sexo, $email, $password){
            $conexion = Yii::app()->db; //conxion 

            
            $password = sha1($password); //encripto el pass
            $codigo_verificacion = $this->codigo_verificacion = rand(1000, 9999); //una manera de codigo de verificacion

            $consulta = "INSERT INTO usuarios (nombre, apellido, email, password, sexo, codigo_verificacion)
                        VALUES ('$nombre', '$apellido', '$email', '$password', '$sexo', '$codigo_verificacion')";

            $result = $conexion->createCommand($consulta);
            $result->execute();
        }
    }
?>