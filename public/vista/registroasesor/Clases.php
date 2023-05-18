<?php

class Asesor
{
    public $id;
    public $nombre;
    public $ape_paterno;
    public $ape_materno;
    public $telefono;
    public $correo;
    public $fk_inmobiliaria;
    public $fk_datousuario;
    public $CURP;

    public function __construct($id, $nombre, $ape_paterno, $ape_materno, $telefono, $correo, $fk_inmobiliaria, $fk_datousuario, $CURP)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ape_paterno = $ape_paterno;
        $this->ape_materno = $ape_materno;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->fk_inmobiliaria = $fk_inmobiliaria;
        $this->fk_datousuario = $fk_datousuario;
        $this->CURP = $CURP;
    }

    public function insertarDatosAsesor($conexion)
    {
        $query = "INSERT INTO inmueblepr.asesor(ID_asesor,nombre, ape_paterno, ape_materno, telefono, correo, fk_inmobiliaria, fk_datousuario, CURP) 
        VALUES ('$this->id','$this->nombre', '$this->ape_paterno', '$this->ape_materno', '$this->telefono', '$this->correo', $this->fk_inmobiliaria, $this->fk_datousuario, '$this->CURP')";

        if ($conexion->query($query) === TRUE) {
            return TRUE;
        }
    }
}

class DatosUsuario
{

    public $id;
    public $username;
    public $password;
    public $token;

    public function __construct($id, $username, $password, $token)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->token = $token;
    }

    public function insertarDatosUsuario($conexion)
    {
        $query = "INSERT INTO inmueblepr.datosusuario(ID_datosusuario,username, password, token) 
        VALUES ('{$this->id}','{$this->username}', '{$this->password}', '{$this->token}')";

        if ($conexion->query($query) === TRUE) {
            return TRUE;
        }
    }
}

class Inmobiliaria
{
    public $id;
    public $nombreEmpresa;
    public $ubicacionEmpresa;
    public $descripcionEmpresa;
    public $telefonoEmpresa;
    public $logo;
    public $rpc;
    public $correoEmpresa;

    public function __construct($id, $nombreEmpresa, $ubicacionEmpresa, $descripcionEmpresa, $telefonoEmpresa, $logo, $rpc, $correoEmpresa)
    {
        $this->id = $id;
        $this->nombreEmpresa = $nombreEmpresa;
        $this->ubicacionEmpresa = $ubicacionEmpresa;
        $this->descripcionEmpresa = $descripcionEmpresa;
        $this->telefonoEmpresa = $telefonoEmpresa;
        $this->logo = $logo;
        $this->rpc = $rpc;
        $this->correoEmpresa = $correoEmpresa;
    }

    public function insertarInmobiliaria($conexion)
    {
        $query = "INSERT INTO inmueblepr.inmobiliarias(ID_inmobiliarias, nombreEmpresa, ubicacion, descripcion, telefono, logo, RPC, correo) 
        VALUES ('$this->id', '$this->nombreEmpresa', '$this->ubicacionEmpresa', '$this->descripcionEmpresa', '$this->telefonoEmpresa', '$this->logo', '$this->rpc', '$this->correoEmpresa')";
        if ($conexion->query($query) === TRUE) {
            return TRUE;
        }
    }


}

?>