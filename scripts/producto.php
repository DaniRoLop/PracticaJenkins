<?php

  
class Producto {

  // ********************************************
  // ESTADO!!!
  // ********************************************
  // Properties

  private $codigo;   
  private $descripcion;
  private $porcentajeRebaja;  //valor de 0 a 100 
  private $estaRebajado;     // si está a true, entonces hay que aplicar la rebaja en el precio
  private $precio;  
  
  // ********************************************
  // COMPORTAMIENTO!!!
  // ********************************************
  // Methods
  // Constructor
  function __construct($nCodigo, $nDescripcion, $nPorcRebaja, $rebajado, $nPrecio) {
  
    $this->codigo = $nCodigo;
    $this->descripcion = $nDescripcion;

    //cuidado, la rebaja no puede ser negativa ni mayor que 100
    if ($nPorcRebaja >= 0 && $nPorcRebaja <= 100) {
        $this->porcentajeRebaja = $nPorcRebaja;
    } else {
        $this->porcentajeRebaja = 0;
    }
    
    $this->estaRebajado = $rebajado;
    $this->precio = $nPrecio; 
    
  }

  //Activar / desactivar la rebaja
  function cambiarModoRebaja($modoRebaja) {
      $this->estaRebajado = $modoRebaja;
  }
  
  //Getters

  function getCodigo() {
    return $this->codigo;
  }

  function getDescripcion() {
    return $this->descripcion;
  }
  
  function getPorcentajeRebaja() {
    return $this->porcentajeRebaja;
  }

  function getEstaRebajado() {
    return $this->estaRebajado;
  }
  
  //Este es un poquito más complejo. Hay que ver si estamos en rebajas o no.
  function getPrecio() {
    if ($this->estaRebajado) {
       return $this->precio - $this->precio*$this->porcentajeRebaja/100;  //Cuando hay rebajas, las aplicamos, pero precio interno no cambia.
    } else {
       return $this->precio;
    }
    
  }


  //sql para inserción del producto
  function getInsertSQL() {
    $sql = "INSERT INTO productos (codigo, descripcion, rebaja,estarebajas,precio) VALUES ($this->codigo,'$this->descripcion',$this->porcentajeRebaja,$this->estaRebajado,$this->precio) ";

    return $sql;
  }


}
?>