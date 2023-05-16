<?php
class Asesor {
    public $id;
    public $nombre;
    public $ape_paterno;
    public $ape_materno;
    public $telefono;
    public $correo;
    public $fk_inmobiliaria;
    public $fk_datousuario;
    public $CURP;
    
    public function __construct($id) {
        $this->id = $id;
    }
    
    public function __constructWithData($id=0, $nombre, $ape_paterno, $ape_materno, $telefono, $correo, $fk_inmobiliaria, $fk_datousuario, $CURP) {
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
}

?>