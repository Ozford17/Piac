            <script type="text/javascript">
                $(document).ready(function(){

                    $('#formulario_datos_generales').submit(function(){

                        $.ajax({
                            url:'bean/actualizar_datos_generales.php',
                            type:'POST',
                            dataType:'html',
                            data:$('#formulario_datos_generales').serialize(),
                            success:function(data){
                                console.log(data);
                                $('#info').html(data);
                                $('#informacion').load('bean/Datos_generales.php');
                            }
                        });

                    });

                })

            </script>
            <form action="javascript:Guardar_generales.focus();" id="formulario_datos_generales">
                <?php
                require_once'../../../src/consultas.php';
                $consultas= new consultas();
                session_start();
                $resp=$consultas->BuscarEmpresa_codigo($_SESSION['empresa']);
                if($fila=mysqli_fetch_array($resp))
                {

                ?>
                <div id="info"></div>
                <center><h2> Informacion de la empresa</h2></center><br>
                <table align="center" style="text-align: center; width: 100%;">
                        <tr>
                                <td>
                                        <label>Nombre de la empresa</label><br>
                                        <input type="text"name="N_empresa"  placeholder="<?=$fila[2]?>"><br>
                                </td>
                                <td>
                                        <label>Nit</label><br>
                                        <input type="number" name="nit"  placeholder="<?=$fila[1]?>"><br>
                                </td>
                        </tr>
                         <tr>
                                <td>
                                        <label>CIIU</label><br>
                                        <input type="text" name="ciiu"  placeholder="<?=$fila[6]?>"><br>
                                </td>
                                <td>
                                        <label>Correo</label><br>
                                        <input type="mail" name="correo"  placeholder="<?=$fila[5]?>"><br>
                                        
                                </td>
                        </tr>
                         <tr>
                                <td>
                                    <label>Telefono</label><br>
                                        <input type="number" name="telefono"  placeholder="<?=$fila[4]?>"><br>  
                                        
                                </td>
                                <td>
                                            <label>Contacto </label><br>
                                        <input type="text" name="N_representante"  placeholder="<?=$fila[3]?>"><br>                          
                                </td>
                        </tr>
                        
                        <tr>
                                <td colspan="2 ">
                                        <input type="submit" name="Guardar_generales" id="Guardar_generales" value="Guardar">
                                </td>
                        </tr>
                </table>
                <?php
                    }
                ?>
            </form>
                

                
                
                
                
                
                
                
                