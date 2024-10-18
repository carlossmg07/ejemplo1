<?php

class venta {

    function __construct() 
    {
        require_once("conexion.php");
        $this->conexion=new Conexion();
    }

    function insertar($folio, $total, $fkusuario, $estatus){
        $sql="insert into venta (idventa, folio, fecha, hora, total, fkusuario, estatus)
        values (null, '{$folio}', now(), now(), '{$total}', '{$fkusuario}', '{$estatus}')";
        $respuesta=$this->conexion->query($sql);
        $id=$this->conexion->insert_id;
        return $id;
    }

    function insertarDetalle(){
        $sql="insert into detalle_venta (iddetalle, fkproducto, fkventa, cantidad, subtotal, estatus)
        values (null, '{$fkproducto}', '{$fkventa}', '{$cantidad}', '{$subtotal}', '{$estatus}')";
        $respuesta=$this->conexion->query($sql);
        return $this->conexion->insert_id;
    }
  
    function verCarrito($idusuario){
        $sql="SELECT * FROM venta WHERE fkusuario='{$idusuario}' AND estatus=0";
        $respuesta=$this->conexion->query($sql);
        return $respuesta;
    }

    function mostrarVenta($idusuario, $estatus){
        $sql="SELECT * FROM venta v LEFT JOIN detalle_venta d ON v.idventa=d.fkventa INNER JOIN 
        producto p ON p.idproducto=d.fkproducto WHERE v.fkusuario='{$idusuario}' 
        AND v.estatus='{$estatus}' ";
        $respuesta=$this->conexion->query($sql);
        return $respuesta;
    }
}

?>