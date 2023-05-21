<?php

class Asesor
{
    public $id;
    public $nombre;
    public $ape_paterno;
    public $ape_materno;
    public $telefono;
    public $correo;
    public $CURP;

    public function __construct($id, $nombre = null, $ape_paterno = null, $ape_materno = null, $telefono = null, $correo = null, $CURP = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ape_paterno = $ape_paterno;
        $this->ape_materno = $ape_materno;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->CURP = $CURP;
    }

    public function insertarDatosAsesor($conexion)
    {
        $query = "INSERT INTO inmueblepr.asesor(ID_asesor,nombre, ape_paterno, ape_materno, telefono, correo,  CURP) 
        VALUES ('$this->id','$this->nombre', '$this->ape_paterno', '$this->ape_materno', '$this->telefono', '$this->correo', '$this->CURP')";

        if ($conexion->query($query) === TRUE) {
            return TRUE;
        }
    }
}

class DatosUsuario
{


    public $username;
    public $password;
    public $token;

    public $fk_asesor;

    public function __construct($username, $password, $token, $fk_asesor)
    {
        $this->username = $username;
        $this->password = $password;
        $this->token = $token;
        $this->fk_asesor = $fk_asesor;
    }

    public function insertarDatosUsuario($conexion)
    {
        $query = "INSERT INTO inmueblepr.datosusuario(username, password, token,fk_asesor) 
        VALUES ('{$this->username}',  '{$this->password}}', '{$this->token}','{$this->fk_asesor}')";

        if ($conexion->query($query) === TRUE) {
            return TRUE;
        }
    }
}

class Inmobiliaria
{
    public $nombreEmpresa;
    public $ubicacionEmpresa;
    public $descripcionEmpresa;
    public $telefonoEmpresa;
    public $logo;
    public $rpc;
    public $correoEmpresa;
    public $fk_asesor;

    public function __construct($nombreEmpresa, $ubicacionEmpresa, $descripcionEmpresa, $telefonoEmpresa, $logo, $rpc, $correoEmpresa, $fk_asesor)
    {

        $this->nombreEmpresa = $nombreEmpresa;
        $this->ubicacionEmpresa = $ubicacionEmpresa;
        $this->descripcionEmpresa = $descripcionEmpresa;
        $this->telefonoEmpresa = $telefonoEmpresa;
        $this->logo = $logo;
        $this->rpc = $rpc;
        $this->correoEmpresa = $correoEmpresa;
        $this->fk_asesor = $fk_asesor;
    }

    public function insertarInmobiliaria($conexion)
    {
        $query = "INSERT INTO inmueblepr.inmobiliarias( nombreEmpresa, ubicacion, descripcion, telefono, logo, RPC, correo,fk_asesor) 
        VALUES ( '$this->nombreEmpresa', '$this->ubicacionEmpresa', '$this->descripcionEmpresa', '$this->telefonoEmpresa', '$this->logo', '$this->rpc', '$this->correoEmpresa','{$this->fk_asesor}')";
        if ($conexion->query($query) === TRUE) {
            return TRUE;
        }
    }


}

?>