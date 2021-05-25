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

        $nombre=$this->request->getPost("nombre");
        $correo=$this->request->getPost("correo");
        $fecha=$this->request->getPost("fecha");
        $numero=$this->request->getPost("numero");
        $password=$this->request->getPost("password");
        $passwordC=$this->request->getPost("passwordC");

        $arregloDatos=array(
            "nombre"=>$nombre,
            "correo"=>$correo,
            "fecha"=>$fecha,
            "numero"=>$numero,
            "password"=>$password,
            "passwordC"=>$passwordC
        );

        $id=$this->model->insert($arregloDatos);

        $mensaje=array(
            "msj"=>"exito agregando el usuario",
            "estado"=>true
        );

        return $this->respond(json_encode($mensaje));
    }

    // ...
}