<?php
class Inmueble {
    public $id;
    public $nombre;
    public $precio;
    public $descripcion;
    public $fk_asesor;
    public $fk_tipooperacion;
    public $fk_tipodeinmueble;
    public $inmueblecantidad;
    
    public function __construct($id, $nombre, $precio, $descripcion, $fk_asesor, $fk_tipooperacion, $fk_tipodeinmueble, $inmueblecantidad) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->fk_asesor = $fk_asesor;
        $this->fk_tipooperacion = $fk_tipooperacion;
        $this->fk_tipodeinmueble = $fk_tipodeinmueble;
        $this->inmueblecantidad = $inmueblecantidad;
    }
    public function insertInmueble($conexion)
    {
        $query = "INSERT INTO inmueblepr.inmueble(ID_inmueble,nombre,precio,descripcion,fk_asesor,fk_tipooperacion,fk_tipodeinmueble,inmueblecantidad) 
        VALUES ('{$this->id}','{$this->nombre}','{$this->precio}','{$this->descripcion}','{$this->fk_asesor}','{$this->fk_tipooperacion}','{$this->fk_tipodeinmueble}','{$this->inmueblecantidad}')";
        if ($conexion->query($query) === TRUE) {
            return TRUE;
        }
    }

}

class Caracteristicas {

    public $superficieTerrestre;
    public $superficieConstru;
    public $no_estacionamiento;
    public $no_baños;
    public $no_recamaras;
    public $fk_inmueble;
    public $fk_estadoinmueble;
    
    public function __construct($superficieTerrestre, $superficieConstru, $no_estacionamiento, $no_baños, $no_recamaras, $fk_inmueble, $fk_estadoinmueble) {
        $this->superficieTerrestre = $superficieTerrestre;
        $this->superficieConstru = $superficieConstru;
        $this->no_estacionamiento = $no_estacionamiento;
        $this->no_baños = $no_baños;
        $this->no_recamaras = $no_recamaras;
        $this->fk_inmueble = $fk_inmueble;
        $this->fk_estadoinmueble = $fk_estadoinmueble;
    }

    public function insertarCarac($conexion)
    {
        $query = "INSERT INTO inmueblepr.caracterisiticas(superficieTerrestre,superficieConstru,no_estacionamiento,no_baños,no_recamaras,fk_inmueble,fk_estadoinmueble) 
        VALUES ('{$this->superficieTerrestre}','{$this->superficieConstru}','{$this->no_estacionamiento}','{$this->no_baños}','{$this->no_recamaras}','{$this->fk_inmueble}','{$this->fk_estadoinmueble}')";
        if ($conexion->query($query) === TRUE) {
            return TRUE;
        }
    }
}

class Ubicacion {

    public $calle;
    public $fk_colonia;
    public $fk_inmueble;
    public $descripcion;
    public $codigo_postal;
    
    public function __construct($calle, $fk_colonia, $fk_inmueble, $descripcion,$codigo_postal) {

        $this->calle = $calle;
        $this->fk_colonia = $fk_colonia;
        $this->fk_inmueble = $fk_inmueble;
        $this->descripcion = $descripcion;
        $this->codigo_postal =$codigo_postal;
    }
    public function insertarUbi($conexion)
    {
        $query = "INSERT INTO inmueblepr.ubicacion(calle,fk_colonia,fk_inmueble,descripcion,codigo_postal) 
        VALUES (''{$this->calle}','{$this->fk_colonia}','{$this->fk_inmueble}','{$this->descripcion}','{$this->codigo_postal}')";
        if ($conexion->query($query) === TRUE) {
            return TRUE;
        }
    }

}

class Galeria {
    public $img;
    public $fk_inmueble;
    
    public function __construct($img, $fk_inmueble) {
        $this->img = $img;
        $this->fk_inmueble = $fk_inmueble;
    }
    public function insertaImg($conexion)
    {
        $query = "INSERT INTO inmueblepr.galeria(img,fk_inmueble) 
        VALUES ('{$this->img}','{$this->fk_inmueble}')";
        if ($conexion->query($query) === TRUE) {
            return TRUE;
        }
    }
}


?>

