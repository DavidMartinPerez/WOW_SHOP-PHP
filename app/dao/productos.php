<?php

    require 'conexion.php';
    class Producto {
        //######### OBTENER TODOS LOS PRODUCTOS ##############
        public function obtenerTodosProductos($filtro){
            global $bd;
            //SQL Para recuperar todos los Juegos y Consolas.
            $sqlTodosProductos = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, version.img , ed.idEdicion,
                    dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma,
                     version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
                    FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
                    where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego
                    AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora";

            $reg = $bd->query($sqlTodosProductos);
            $bd->close();

            return $reg;
        }
        //########## /Obtener Productos ##################

        //########## Obtener un registro Producto ########
        public function  obtenerInfoProducto($id){
            global $bd;
            $sqlInfoProducto = "SELECT version.idVersion, version.img , juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma, juego.descripJuego ,version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
                    FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
                    where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora AND version.idVersion = $id";

            $reg = $bd->query($sqlInfoProducto);
            $dato = mysqli_fetch_assoc($reg);
        	$bd->close();

            return $dato;
        }
    } //class Producto
?>