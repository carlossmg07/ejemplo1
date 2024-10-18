<?php
    include('menu.php');

    include('clases/producto.php');
    $producto = New Producto();
    $datos = $producto->mostrarNuevos();
?>

    <style type="text/css">
        .caja_producto{
            display: inline-block;
            width: 20%;
            border: black 2px solid;
            margin: 10px;
            padding: 20px 30px;
        }

        .a_producto{
            text-decoration: none;
            color: black;
        }
        </style>

<div>
    <h2>Lo mas nuevo</h2>

    <?php
        while($fila=mysqli_fetch_array($datos)){
        $foto=mysqli_fetch_assoc($producto->ObtenerPortada($fila['idproducto']));
        $archivo='';
        
        if($foto!=null){
            $archivo=$foto['ruta'];
        }else{
            $archivo='/no.jpg';
        }
            ?>
            <a class="a_producto" href="detalle_producto.php?producto=<?=$fila['idproducto'] ?>">
            <div class="caja_producto">
            <img width="200px" src="img/<?=$foto['ruta']?>"
            <h3><?=$fila['nombre'] ?></h3>
            <b> <?=$fila['precio'] ?></b>
    </div>

            <?php
        }
    ?>
</div>

<?php
    include('footer.php');
?>
