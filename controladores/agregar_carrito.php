<?php

include('../clases/producto.php');
$producto = New Producto();

$fkproducto = $_POST['fkproducto'];
$cantidad = $_POST['cantidad'];

include('../clases/venta.php');
$venta = New venta();

$carritoActivo = $venta->insertar(null, 0, 1, 0);
//le envio un 1 porque deje un usuario estatico, pero deberia ser el ususario logeado usado
if(mysqli_num_rows($carritoActivo)>0){
    $fkcarrito = mysqli_fetch_assoc($carritoActivo);
    $fkventa=$carrito['idventa'];
    echo "ya habia carrito".$fkventa;
}else{
    $fkventa = $venta->insertar(null,null, 1, 0);
    echo "carrito nuevo".$fkventa;
}




$datosProducto =mysqli_fetch_assoc($producto->mostrarPorId($fkproducto));
$precio = $datosProducto['precio'];
$respuesta = $producto->agregarCarrito($fkventa, $fkproducto, $cantidad, $precio);
if($respuesta){
    echo "<div style='background-color:green; font-size:30px; color:white; padding:20px;'>Agregado a Carrito</div>"
}else{
    echo "Error al agregar al carrito";
}
?>