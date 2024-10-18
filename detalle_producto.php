<?php

    include('menu.php');
    include('clases/producto.php');
    $producto = new Producto();

    $idproducto = $_GET['producto'];


    $datos=mysqli_fetch_assoc($producto->mostrarPorId($idproducto));

    ?>
    <script src="js/jquery.js"></script>
    <style type="text/css">
        .cuadro{
            display: inline-block;
            width: 40%;
            padding: 30px;
        }
        </style>
        <div>
            <div class="cuadro">
                <img src="img/<?=$datos['ruta']?>" width="400px">
            </div>
            <div class="cuadro">
            <h2> <?=$datos['nombre']?> </h2>
            <h4> <?=$datos['precio']?> </h4>
            <p> <?=$datos['descripcion']?> </p>

            <form id="formulario" method="POST">
            <input type="hidden" name="fkproducto" value="<?=$datos["idproducto"]?>">
            <input type="number" name="cantidad" value="1">
            
            <input type="submit" value="Agregar al carrito">

        </form>
            <div id="respuesta"></div>
        </div>
        </div>
    <script>
        $('#formulario').on('submit', function(e){
            alert()
            e.preventDefault()
            $.ajax({
                type:'POST',
                url:'controladores/agregar_carrito.php',
                data: $('formulario').serialize(),
                dataType: 'html',
                error: function(){
                    alert('error');
                },
                success: function(resultado){
                    $('#respuesta').html(resultado).fadeIn();
                    alert(resultado)
                }
            })
        })
    </script>    

    <?php
    include('footer.php');
    ?>