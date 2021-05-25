<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class APIController extends ResourceController{

    protected $modelName = 'App\Models\UsuarioModelo';
    protected $format    = 'json';

    public function index(){

        return $this->respond($this->model->findAll());
    }

    public function registrar(){

        //Se reciben datos del cliente 
        $nombre=$this->request->getPost("nombre");
        $correo=$this->request->getPost("correo");
        $password=$this->request->getPost("password");

        //Se crea arreglo con los datos recibidos
        $arregloDatos=array(
            "nombre"=>$nombre,
            "correo"=>$correo,
            "password"=>$password
        );

        //Se crea la operacion en la BD para grabar la informacion
        $id=$this->model->insert($arregloDatos);

        //Configuro la respuesta
        $mensaje=array(
            "msj"=>"exito agregando el usuario",
            "estado"=>true 
        );

        return $this->respond(json_encode($mensaje));

    }
   
}