<?php
    include "Conexion.php";

    class Asignacion extends Conexion {
        public function agregarAsignacion($datos){
            $conexion = Conexion::conectar();

            $sql = "INSERT INTO t_asignacion (id_persona,	
                                  id_equipo,	
                                  dapsis,	
                                  marca,	
                                  modelo,
                                  color,	
                                  descripcion,	
                                  monitor,	
                                  perifericos,	
                                  almacenamiento,	
                                  ram,	
                                  procesador,	
                                  grafica)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('iisssssssssss', $datos['idPersona'],    
                                                $datos['idEquipo'],
                                                $datos['dapsis'],
                                                $datos['marca'],
                                                $datos['modelo'],
                                                $datos['color'],
                                                $datos['descripcion'],
                                                $datos['monitor'],
                                                $datos['perifericos'],
                                                $datos['almacenamiento'],
                                                $datos['ram'],
                                                $datos['procesador'],
                                                $datos['grafica']    );
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function eliminarAsignacion($idAsignacion){
            $conexion = Conexion::conectar();
            
            $sql = "DELETE FROM t_asignacion WHERE id_asignacion = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i',$idAsignacion);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function obtenerDatosAsignacion($idAsignacion){
            $conexion = Conexion::conectar();
            $sql = "SELECT
                        asignacion.id_asignacion as idAsignacion,
                        persona.id_persona AS idPersona,
                        asignacion.dapsis AS dapsis,
                        equipo.id_equipo AS idEquipo,
                        asignacion.marca AS marca,
                        asignacion.modelo AS modelo,
                        asignacion.color AS color,
                        asignacion.descripcion AS descripcion,
                        asignacion.monitor AS monitor,
                        asignacion.perifericos AS perifericos,
                        asignacion.almacenamiento AS almacenamiento,
                        asignacion.ram AS ram,
                        asignacion.procesador AS procesador,
                        asignacion.grafica AS grafica
                    FROM
                        t_asignacion AS asignacion
                    INNER JOIN t_persona as persona
                    on asignacion.id_persona = persona.id_persona
                    INNER JOIN t_cat_equipo AS equipo
                    ON
                        asignacion.id_equipo = equipo.id_equipo AND asignacion.id_asignacion = $idAsignacion";
            $respuesta = mysqli_query($conexion,$sql);
            $asignacion = mysqli_fetch_array($respuesta);

            $datos = array(
                'idAsignacion' => $asignacion['idAsignacion'],
                'idPersona' => $asignacion['idPersona'],
                'dapsis' => $asignacion['dapsis'],
                'idEquipo' => $asignacion['idEquipo'],
                'marca' => $asignacion['marca'],
                'modelo' => $asignacion['modelo'],
                'color' => $asignacion['color'],
                'descripcion' => $asignacion['descripcion'],
                'monitor' => $asignacion['monitor'],
                'perifericos' => $asignacion['perifericos'],
                'almacenamiento' => $asignacion['almacenamiento'],
                'ram' => $asignacion['ram'],
                'procesador' => $asignacion['procesador'],
                'grafica' => $asignacion['grafica']
            );
            return $datos;
        }

        public function actualizarAsignacion($datos){
            $conexion = Conexion::conectar();
            $idAsignacion = $datos['idAsignacion'];
            $sql = "UPDATE t_asignacion 
                    SET 
                        dapsis = ?,
                        marca = ?,
                        modelo = ?,
                        color = ?,
                        descripcion = ?,
                        monitor = ?,
                        perifericos = ?,
                        almacenamiento = ?,
                        ram = ?,
                        procesador = ?,
                        grafica = ?
                    WHERE id_asignacion = ?";
            $query = $conexion -> prepare($sql);
            $query -> bind_param('sssssssssssi',  $datos['dapsis'],
                                                  $datos['marca'],
                                                  $datos['modelo'],
                                                  $datos['color'],
                                                  $datos['descripcion'],
                                                  $datos['monitor'],
                                                  $datos['perifericos'],
                                                  $datos['almacenamiento'],
                                                  $datos['ram'],
                                                  $datos['procesador'],
                                                  $datos['grafica'],
                                                  $idAsignacion);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
?>