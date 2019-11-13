<?
class Usuario {
    private $id;
    private $nombreUsuario;
    private $contraseña;
    private $nombre;
    private $correo;
    private $cargo;
    private $region;
    private $claseUsuario;

    private $iUsuario;

    public function __construct($nombreUsuario, $nombre, $correo, $cargo, $region, $claseUsuario) {
        $this->setNombreUsuario($nombreUsuario);
        $this->setNombre($nombre);
        $this->setCorreo($correo);
        $this->setCargo($cargo);
        $this->setRegion($region);
        $this->setClaseUsuario($claseUsuario);
    }

    public function setId($id) {
        $this->$id = $id;
    }
    public function getId() {
        return $this->$id;
    }
    public function setNombreUsuario($nombreUsuario) {
        $this->$nombreUsuario = $nombreUsuario;
    }
    public function getNombreUsuario() {
        return $this->$nombreUsuario;
    }
    public function setContraseña($contraseña) {
        $this->$contraseña = $contraseña;
    }
    public function getContraseña() {
        return $this->$contraseña;
    }
    public function setNombre($nombre) {
        $this->$nombre = $nombre;
    }
    public function getNombre() {
        return $this->$nombre;
    }
    public function setCorreo($correo) {
        $this->$correo = $correo;
    }
    public function getCorreo() {
        return $this->$correo;
    }
    public function setCargo($cargo) {
        $this->$cargo = $cargo;
    }
    public function getCargo() {
        return $this->$cargo;
    }
    public function setRegion($region) {
        $this->$region = $region;
    }
    public function getRegion() {
        return $this->$region;
    }
    public function setClaseUsuario($claseUsuario) {
        $this->$claseUsuario = $claseUsuario;
    }
    public function getClaseUsuario() {
        return $this->$claseUsuario;
    }

    public function setIUsuario($iUsuario) {
        $this->$iUsuario = $iUsuario;
    }

    public function existe($nombreUsuario, $contraseña) {
        return $this->iUsuario->existe($nombreUsuario, $contraseña);
    }
    public function obtenerPorCredenciales($nombreUsuario, $contraseña) {
        return $this->iUsuario->obtenerPorCredenciales($nombreUsuario, $contraseña);
    }
}