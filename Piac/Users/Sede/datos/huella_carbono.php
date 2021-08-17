<style>
		input[type="text"],input[type="number"],input[type="date"],select{
			border-radius: 25px;
			text-align: center;
		}
		.Eliminar{
			border-radius:25px;
			width:100%;
			margin-top:1vw;
			background:#C22246;
			color:white;
			height:2vw;
		}
		.Elimin{
			border-radius:25px;
			width:100%!important;
			margin-top:1vw;
			background:#C22246;
			color:white;
			height:2vw;
			font-size: 1vw;
		}
	</style>

<!--<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<script type="text/javascript">
		var con=true;
		var cant=0;
		function cargar(valor,cant){
			var select = document.getElementById("Combustible"+cant);
			var length = select.options.length;
			
			if(length>1){
				while(select.options.length>1){
				  select.options.remove(1);
				}
			}
			
			<?php
			session_start();
				require_once'../../../src/consultas.php'; 
				$consultas= new consultas(); 
				$resp=$consultas->Listado_t_elementos();
				while ($f= mysqli_fetch_array($resp)) {
					echo '
						
					if ('.$f[2].'==valor) {
					var option = $("<option value=\''.$f[0].'\'>'.$f[1].'</option>");
					$("#Combustible"+cant).append(option);	
					}
					
				';
					  
				}
			

			?>
			}
			function c(val){
				var refrigerante=$("<div id='refrigerante"+val+"'><label for='t_r'> Tipo Refrigerante </label><br><select required='' name='Tipo_refrigerante[]' id='Tipo_refrigerante"+val+"' ><option value='select'>Seleccione</option> "+
				<?php
					require_once'../../../src/consultas.php'; 
					$consultas= new consultas(); 
					$resp=$consultas->Listado_refrigerantes();
					while($fila=mysqli_fetch_array($resp)){ 
						echo '"<option value=\''.$fila[0].'\'>'.$fila[1].'</option>"+';
		  					
					}
				 
				?>
				"</select></div>");
					if( $('#us_refrigerante'+val).prop('checked') ) {
    					$('#div_refri'+val).append(refrigerante);

    					}
    					else{
    						$("#refrigerante"+val).remove();
    					}
				}
			function ca(val, para){
				var refrigerante=$("<div id='"+para+"_refrigerante"+val+"'><label for='t_r'> Tipo Refrigerante </label><br><select required='' name='Tipo_refrigerante[]' id='Tipo_refrigerante"+val+"' ><option value='select'>Seleccione</option> "+
				<?php
					require_once'../../../src/consultas.php'; 
					$consultas= new consultas(); 
					$resp=$consultas->Listado_refrigerantes();
					while($fila=mysqli_fetch_array($resp)){ 
						echo '"<option value=\''.$fila[0].'\'>'.$fila[1].'</option>"+';
		  					
					}
				 
				?>
				"</select></div>");
					if( $('#'+para+'_us_refrigerante'+val).prop('checked') ) {
							
    					$('#'+para+'_div_refri'+val).append(refrigerante);

    					}
    					else{
    						$("#"+para+"_refrigerante"+val).remove();
    					}
				}

				function verificar(valor,num){
					
					var extintores=$('<div id="ext'+num+'"> <label for="extintor'+num+'">Extintores</label> <br>'+
					' <select name="extintor[]" id="extintor'+num+'">'+
					     '<option value="seleccione">Seleccione</option>'+
					     '<option value="0">Los Dos</option>'+
					     '<option value="1001">Extintor CO2"</option>'+
					     '<option value="1002">Extintor R-123</option>'+
					'</select></div>');

					var peso=$('<div id="ext'+num+'"> <label for="peso'+num+'">Peso extintor</label> <br> <input id="peso'+num+'" type="number" name="peso[]" min="5" max="500"/> KG</div>');
					if(valor=="1")
					{
						$('#agregar_f_m #holitas_f_m'+num+' #div_extintor'+num).append(extintores);
						$('#agregar_f_m #holitas_f_m'+num+' #div_extintor'+num).append(peso);
						$('#div_extintor'+num).css("display","flex");
						$('#agregar_f_m #holitas_f_m'+num+' #id_div_f_m_us_r'+num).css("display","block");

					}
					else
					{
						
						$('#agregar_f_m #holitas_f_m'+num+' #div_extintor'+num+' #ext'+num).remove();
						$('#agregar_f_m #holitas_f_m'+num+' #id_div_f_m_us_r'+num).css("display","none");
					}
				}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////*****    FUENTES FIJAS *****/////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$('#Añadir_f_f').click(function(e){
		$('#Guardar_huella').removeAttr("disabled");
			if (con) {
				cant=$('#agregar_f_f div').length + 1;
				con=false;

			}
			else
			{
				cant=cant+1;
				
			}
				
				var div_campo= document.createElement('div');
				div_campo.id="holitas"+cant;
				var div_campo1= document.createElement('div');
				div_campo1.id="holitas_a"+cant;
				var div_campo2= document.createElement('div');
				div_campo2.id="holitas_ab"+cant;

				var label_Nombre = $("<div><label for='Nombre_maquina"+cant+"'> Nombre Maquina </label><br> <input required='' type='text' name='Nombre_maquina[]' id='Nombre_maquina"+cant+"'></div>");
				var label_cantidad=$("<div><label for='Cantidad_maquina"+cant+"'> Cantidad Maquina </label><br> <input required='' type='number' min='0' max='200' name='Cantidad_maquina[]' id='Cantidad_maquina"+cant+"'></div>");
				var tipo_combustible=$("<div><label for='Tipo'> Tipo Combustible</label><br><select required='' name='Tipo[]' id='Tipo"+cant+"' onChange='cargar(this.value,"+cant+");'><option value='select'>Seleccione</option> "+
				<?php
					require_once'../../../src/consultas.php'; 
					$consultas= new consultas(); 
					$resp=$consultas->Listado_t_subtipos();
					while($fila=mysqli_fetch_array($resp)){ 
						echo '"<option value=\''.$fila[0].'\'>'.$fila[1].'</option>"+';
		  					
					}
				 
				?>
				"</select></div>");
				var combustible=$("<div><label for='Combustible'>Combustible</label><br><select required='' name='Combustible[]' id='Combustible"+cant+"'> <option value='Seleccione'>Seleccione</select></div>");

				var horas_uso_diario=$("<div><label for='horas_dia"+cant+"'>Horas de uso diario</label><br /><input required='' type='number' name='horas_dia[]' id='horas_dia"+cant+"' min='1' max='24'/>	</div>");

				var dias_uso_semanal=$("<div><label for='dias_semana"+cant+"'>Dias/Semana</label><br /><input required='' type='number' name='dias_semana[]' min='1' id='dias_semana"+cant+"' max='7'/>	</div>");

				var uso_refrigerante=$("<div><label for='us_refrigerante"+cant+"'>¿Usa Refrigerante?</label> <input  type='checkbox' name='refrigerante[]' id='us_refrigerante"+cant+"' onChange='c("+cant+");' /></div>");

				var div_refri=$('<div id="div_refri'+cant+'">	</div>');

				var uso_Lubri=$("<div><label for='us_lubricante"+cant+"'>¿Usa Lubricante?</label> <input  type='checkbox' name='lubricante[]' id='us_lubricante"+cant+"'s></div>");
				
				
				var fecha_funcion=$('<div> <label for="fecha_funcion'+cant+'">Fecha de puesta <br />en funcionamiento</label><br> <input required="" type="date" name="fecha_funcion[]" id="fecha_funcion'+cant+'" max="<?=(date('d')."-".date('m')."-".date('Y'))?>" />			 </div>');

				var boton_eliminar=$("<div style='width:10%;'><button class='Elimin' value='"+cant+"' id='Eliminar"+cant+"'>Eliminar</button></div>");
				
				$('#agregar_f_f').append(div_campo);
				$('#holitas'+cant).css("display","block");
				$('#holitas'+cant).css("text-align","center");
				$('#holitas'+cant).append("<br />");
				$('#holitas'+cant).append(div_campo1);
				$('#holitas'+cant).append("<br />");
				$('#holitas'+cant).append(div_campo2);

				$('#holitas'+cant+' #holitas_a'+cant).css("display","flex");
				$('#holitas'+cant+' #holitas_a'+cant).css("width","100%");
				$('#holitas'+cant+' #holitas_ab'+cant).css("display","flex");
				$('#holitas'+cant+' #holitas_ab'+cant).css("width","100%");
				$('#cant').val(cant);


				$('#agregar_f_f #holitas'+cant+' #holitas_a'+cant).append(label_Nombre);
				$('#agregar_f_f #holitas'+cant+' #holitas_a'+cant).append(label_cantidad);
				$('#agregar_f_f #holitas'+cant+' #holitas_a'+cant).append(tipo_combustible);
				$('#agregar_f_f #holitas'+cant+' #holitas_a'+cant).append(combustible);
				$('#agregar_f_f #holitas'+cant+' #holitas_a'+cant).append(horas_uso_diario);
				$('#agregar_f_f #holitas'+cant+' #holitas_a'+cant).append(fecha_funcion);

				$('#agregar_f_f #holitas'+cant+' #holitas_ab'+cant).append(dias_uso_semanal);
				$('#agregar_f_f #holitas'+cant+' #holitas_ab'+cant).append(uso_refrigerante);
				$('#agregar_f_f #holitas'+cant+' #holitas_ab'+cant).append(div_refri);
				$('#agregar_f_f #holitas'+cant+' #holitas_ab'+cant).append(uso_Lubri);
				$('#agregar_f_f #holitas'+cant+' #holitas_ab'+cant).append(boton_eliminar);

				
				
				$('#Eliminar'+cant).click(function(e){
					var v=$(this).val();
					$('#holitas'+v).remove();
				});
				
				

	});
/////////////////////////////////////////////////////      FUENTES FIJAS ELECTRICAS         //////////////////////////////////
	$('#Añadir_f_f_e').click(function(e){
		$('#Guardar_huella_f_f_e').removeAttr("disabled");
			if (con) {
				cant=$('#agregar_f_f_e div').length + 1;
				con=false;
			}
			else
			{
				cant=cant+1;
				
			}
				
				var div_campo= document.createElement('div');
				div_campo.id="holitas_f_f_e"+cant;
				var equipo = $("<div><label for='Equipo"+cant+"'> Nombre del equipo </label><br> <input type='text' name='Equipo[]' id='Equipo"+cant+"'></div>");

				var Cantidad_e=$("<div><label for='Cantidad_equipos"+cant+"'> Cantidad de equipos </label><br> <input type='number' min='0' max='200' name='Cantidad_equipos[]' id='Cantidad_equipos"+cant+"'/></div>");

				//var Potencia=$("<div><label for='Tipo'> Potencia</label><br><input type='number' step='0.1' min='0' name='Potencia[]' id='Potencia"+cant+"'/></div>");

				//var consumo=$("<div><label for='Consumo"+cant+"'> Consumo </label><br> <input step='0.01' type='number' name='Consumo[]' min='0' id='Consumo"+cant+"'></div>");

				var Horas_dia=$("<div><label for='Horas_dia_i'>Horas al dia</label><br><input type='number' min='0' max='24' id='Horas_dia_i"+cant+"' name='Horas_dia_i[]' /></div>");

				var Dias_uso=$("<div><label for='Dias_uso_i"+cant+"'> Dias de uso </label><br> <input  type='number' min='0' max='7' name='Dias_uso_i[]' id='Dias_uso_i"+cant+"'></div>");

				var Fecha_funcion=$('<div> <label for="fecha_funcion'+cant+'">Fecha de puesta <br />en funcionamiento</label><br> <input required="" type="date" name="fecha_funcion[]" id="fecha_funcion'+cant+'" max="<?=(date('d')."-".date('m')."-".date('Y'))?>" />			 </div>');

				var boton_eliminar=$("<div style='width:10%;'><button value='"+cant+"' class='Elimin' id='Eliminar_f_f_e"+cant+"'>Eliminar</button></div>");

				var uso_refrigerante=$("<div><label for='f_f_e_us_refrigerante"+cant+"'>¿Usa Refrigerante?</label> <input  type='checkbox' name='refrigerante[]' id='f_f_e_us_refrigerante"+cant+"' onChange='ca("+cant+",\"f_f_e\");' /></div>");

				var uso_Lubri=$("<div><label for='us_lubricante"+cant+"'>¿Usa Lubricante?</label> <input  type='checkbox' name='lubricante[]' id='us_lubricante"+cant+"'s></div>");

				var div_refri=$('<div id="f_f_e_div_refri'+cant+'">	</div>');
				
				$('#agregar_f_f_e').append(div_campo);
				$('#holitas_f_f_e'+cant).css("display","flex");
				$('#holitas_f_f_e'+cant).css("text-align","center");
				$('#agregar_f_f_e #holitas_f_f_e'+cant).append(equipo);
				$('#agregar_f_f_e #holitas_f_f_e'+cant).append(Cantidad_e);
				//$('#agregar_f_f_e #holitas_f_f_e'+cant).append(Potencia);
				//$('#agregar_f_f_e #holitas_f_f_e'+cant).append(consumo);
				$('#agregar_f_f_e #holitas_f_f_e'+cant).append(Horas_dia);				
				$('#agregar_f_f_e #holitas_f_f_e'+cant).append(Dias_uso);
				$('#agregar_f_f_e #holitas_f_f_e'+cant).append(Fecha_funcion);
				$('#agregar_f_f_e #holitas_f_f_e'+cant).append(uso_refrigerante);
				$('#agregar_f_f_e #holitas_f_f_e'+cant).append(div_refri);
				$('#agregar_f_f_e #holitas_f_f_e'+cant).append(uso_Lubri);
				$('#agregar_f_f_e #holitas_f_f_e'+cant).append(boton_eliminar);


				$('#Eliminar_f_f_e'+cant).click(function(e){
					var v=$(this).val();
					$('#holitas_f_f_e'+v).remove();
				});
				

	});

/////////////////////////////////////////////   FUENTES MOVILES ///////////////////////////////////////////////////////////////////
	$('#Añadir_f_m').click(function(e){
		$('#Guardar_huella_f_m').removeAttr("disabled");
			if (con) {
				cant=$('#agregar_f_m div').length + 1;
				con=false;
			}
			else
			{
				cant=cant+1;
				
			}
				
				var div_campo= document.createElement('div');
				div_campo.id="holitas_f_m"+cant;
				var div_campo1= document.createElement('div');
				div_campo1.id="holitas_a"+cant;
				var div_campo2= document.createElement('div');
				div_campo2.id="holitas_ab"+cant;


				var Vehiculo = $("<div><label for='Vehiculo"+cant+"'>Marca Vehiculo</label><br> <input type='text' name='Vehiculo[]' id='Vehiculo"+cant+"'></div>");
				var Placa=$("<div><label for='Placa"+cant+"'> Placa </label><br> <input type='text' name='Placa[]' id='Placa"+cant+"'></div>");
				var tipo_carro=$("<div><label for='Tipo'> Tipo de vehiculo</label><br>"+
					"<select name='Tipo[]' id='Tipo"+cant+"' onChange='verificar(value,"+cant+");' >"+
						"<option value='select'>Seleccione</option>"+
						"<option value='1'>Combustion Interna</option>"+
						"<option value='2'>Hibrido</option> "+
					"</select></div>");
				var Fecha_funcion=$('<div> <label for="fecha_funcion'+cant+'">Fecha incorporación</label><br> <input required="" type="date" name="fecha_funcion[]" id="fecha_funcion'+cant+'" max="<?=(date('d')."-".date('m')."-".date('Y'))?>" /></div>');
				var combustible=$("<div><label for='Combustible'>Combustible</label><br><select name='Combustible[]' id='Combustible"+cant+"' '><option value='select'>Seleccione</option> "+
				<?php
					require_once'../../../src/consultas.php'; 
					$consultas= new consultas(); 
					$resp=$consultas->Listado_elementos("2");
					while($fi=mysqli_fetch_array($resp)){ 
						echo '"<option value=\''.$fi[0].'\'>'.$fi[1].'</option>"+';
		  					
					}
				 
				?>
				"</select></div>");
				var div_extintor=$('<div id="div_extintor'+cant+'"></div>')

				var usa_refigerante=$("<div id='id_div_f_m_us_r"+cant+"' style='display:none;'><label for='f_m_us_refrigerante"+cant+"'>¿Usa Refrigerante?</label> <input  type='checkbox' name='refrigerante[]' id='f_m_us_refrigerante"+cant+"' onChange='ca("+cant+",\"f_m\");' /></div>");

				var div_refri=$('<div id="f_m_div_refri'+cant+'">	</div>');
				

				//var consumo=$("<div><label for='Consumo"+cant+"'> Consumo </label><br> <input step='0.01' type='number' name='Consumo[]' min='0' id='Consumo"+cant+"'></div>"); 
				var boton_eliminar=$("<div style='width:10%;'><button value='"+cant+"' class='Elimin' id='Eliminar_f_m"+cant+"'>Eliminar</button></div>");
				
				$('#agregar_f_m').append(div_campo);
				$('#holitas_f_m'+cant).css("display","block");
				$('#holitas_f_m'+cant).css("text-align","center");
				$('#holitas_f_m'+cant).append("<br />");
				$('#holitas_f_m'+cant).append(div_campo1);
				$('#holitas_f_m'+cant).append("<br />");
				$('#holitas_f_m'+cant).append(div_campo2);

				$('#holitas_f_m'+cant+' #holitas_a'+cant).css("display","flex");
				$('#holitas_f_m'+cant+' #holitas_a'+cant).css("width","100%");
				$('#holitas_f_m'+cant+' #holitas_ab'+cant).css("display","flex");
				$('#holitas_f_m'+cant+' #holitas_ab'+cant).css("width","100%");

				$('#agregar_f_m #holitas_f_m'+cant+' #holitas_a'+cant).append(Vehiculo);
				$('#agregar_f_m #holitas_f_m'+cant+' #holitas_a'+cant).append(Placa);
				$('#agregar_f_m #holitas_f_m'+cant+' #holitas_a'+cant).append(tipo_carro);
				$('#agregar_f_m #holitas_f_m'+cant+' #holitas_a'+cant).append(Fecha_funcion);
				$('#agregar_f_m #holitas_f_m'+cant+' #holitas_ab'+cant).append(combustible);
				$('#agregar_f_m #holitas_f_m'+cant+' #holitas_ab'+cant).append(div_extintor);
				$('#agregar_f_m #holitas_f_m'+cant+' #holitas_ab'+cant).append(usa_refigerante);
				$('#agregar_f_m #holitas_f_m'+cant+' #holitas_ab'+cant).append(div_refri);

				
				//$('#agregar_f_m #holitas_f_m'+cant).append(consumo);
				$('#agregar_f_m #holitas_f_m'+cant+' #holitas_ab'+cant).append(boton_eliminar);

				
				$('#Eliminar_f_m'+cant).click(function(e){
					var v=$(this).val();
					$('#holitas_f_m'+v).remove();
				});
				

	});

//////////////////////////////////////////////   FUENTES MOVILES ELECTRICOS //////////////////////////////////////////////////
	$('#Añadir_f_m_e').click(function(e){
		$('#Guardar_huella_f_m_e').removeAttr("disabled");
			if (con) {
				cant=$('#agregar_f_m_e div').length + 1;
				con=false;
			}
			else
			{
				cant=cant+1;
				
			}
				
				var div_campo= document.createElement('div');
				div_campo.id="holitas_f_m_e"+cant;
				var div_campo1= document.createElement('div');
				div_campo1.id="holitas_a"+cant;
				var div_campo2= document.createElement('div');
				div_campo2.id="holitas_ab"+cant
				/****************************************************************/
				var Placa = $("<div><label for='Placa"+cant+"'> Placa</label><br> <input type='text' name='Placa[]' id='Placa"+cant+"'></div>");
				var Potencia=$("<div><label for='Potencia"+cant+"'> Potencia (HP) </label><br> <input type='number' min='0' step='0' name='Potencia[]' id='Potencia"+cant+"'></div>");
				var Horas_carga=$("<div><label for='horas_carga'> Carga diaria(h) </label><br><input type='number' min='0' step='0.1' max='24'  name='horas_carga[]' id='horas_carga"+cant+"' /></div>");
				var Dias_uso=$("<div><label for='Dias'>Dias de uso</label><br><input type='number' min='0' max='7' name='Dias[]' id='Dias"+cant+"' min='0'/></div>");
				var Fecha_funcion=$('<div> <label for="fecha_funcion'+cant+'">Fecha de puesta <br/>en funcionamiento</label><br> <input required="" type="date" name="fecha_funcion[]" id="fecha_funcion'+cant+'" max="<?=(date('d')."-".date('m')."-".date('Y'))?>" /></div>');
				var extintores=$('<div id="ext'+cant+'"> <label for="extintor'+cant+'">Extintores</label> <br>'+
					' <select name="extintor[]" id="extintor'+cant+'">'+
					     '<option value="seleccione">Seleccione</option>'+
					     '<option value="0">Los Dos</option>'+
					     '<option value="1001">Extintor CO2"</option>'+
					     '<option value="1002">Extintor R-123</option>'+
					'</select></div>');
				var peso=$('<div id="ext'+cant+'"> <label for="peso'+cant+'">Peso extintor</label> <br> <input id="peso'+cant+'" type="number" name="peso[]" min="5" max="500"/> KG</div>');

				var usa_refigerante=$("<div  id='id_div_f_m_us_r"+cant+"' ><label for='f_m_us_refrigerante"+cant+"'>¿Usa Refrigerante?</label> <input  type='checkbox' name='refrigerante[]' id='f_m_us_refrigerante"+cant+"' onChange='ca("+cant+",\"f_m\");' /></div>");

				var div_refri=$('<div id="f_m_div_refri'+cant+'">	</div>');

				var boton_eliminar=$("<div style='width:10%;'><button value='"+cant+"' class='Elimin' id='Eliminar_f_m_e"+cant+"'>Eliminar</button></div>");
				
				$('#agregar_f_m_e').append(div_campo);
				$('#holitas_f_m_e'+cant).css("display","block");
				$('#holitas_f_m_e'+cant).css("text-align","center");
				$('#holitas_f_m_e'+cant).append("<br />");
				$('#holitas_f_m_e'+cant).append(div_campo1);
				$('#holitas_f_m_e'+cant).append("<br />");
				$('#holitas_f_m_e'+cant).append(div_campo2);

				$('#holitas_f_m_e'+cant+' #holitas_a'+cant).css("display","flex");
				$('#holitas_f_m_e'+cant+' #holitas_a'+cant).css("width","100%");
				$('#holitas_f_m_e'+cant+' #holitas_ab'+cant).css("display","flex");
				$('#holitas_f_m_e'+cant+' #holitas_ab'+cant).css("width","100%");


				$('#agregar_f_m_e #holitas_f_m_e'+cant+' #holitas_a'+cant).append(Placa);
				$('#agregar_f_m_e #holitas_f_m_e'+cant+' #holitas_a'+cant).append(Potencia);
				$('#agregar_f_m_e #holitas_f_m_e'+cant+' #holitas_a'+cant).append(Horas_carga);
				$('#agregar_f_m_e #holitas_f_m_e'+cant+' #holitas_a'+cant).append(Dias_uso);
				$('#agregar_f_m_e #holitas_f_m_e'+cant+' #holitas_a'+cant).append(Fecha_funcion);

				$('#agregar_f_m_e #holitas_f_m_e'+cant+' #holitas_ab'+cant).append(extintores);
				$('#agregar_f_m_e #holitas_f_m_e'+cant+' #holitas_ab'+cant).append(peso);
				$('#agregar_f_m_e #holitas_f_m_e'+cant+' #holitas_ab'+cant).append(usa_refigerante);
				$('#agregar_f_m_e #holitas_f_m_e'+cant+' #holitas_ab'+cant).append(div_refri);
				$('#agregar_f_m_e #holitas_f_m_e'+cant+' #holitas_ab'+cant).append(boton_eliminar);

				$('#Eliminar_f_m_e'+cant).click(function(e){
					var v=$(this).val();
					$('#holitas_f_m_e'+v).remove();
				});
				
			});

////////////////////////////////////////////// FUENTES DE LUMINACIONES //////////////////////////////////////////////////////////////
	$('#Añadir_i').click(function(e){
		$('#Guardar_huella_i').removeAttr("disabled");
			if (con) {
				cant=$('#agregar_i div').length + 1;
				con=false;
			}
			else
			{
				cant=cant+1;
				
			}
				
				var div_campo= document.createElement('div');
				div_campo.id="holitas_i"+cant;
				var div_campo1= document.createElement('div');
				div_campo1.id="holitas_arriba"+cant;
				var div_campo2= document.createElement('div');
				div_campo2.id="holitas_abajo"+cant;
				var Tipo_i=$("<div>	<label for='Tipo_i"+cant+"'> Tipo de Luminaria</label><br> <input type='text' name='Tipo_i[]' id='Tipo_i"+cant+"'></div>");
				/*var Tipo_i = $("<div><label for='Tipo_i"+cant+"'> Tipo de Iluminarias</label><br> <select required='' name='Tipo_i[]' id='Tipo_i"+cant+"'><option value='Seleccione'>Seleccione..</option><option value='Bombillo estandar'>Bombillo estandar</option><option value='Bombillos Halogenas'>Bombillas Halogenas</option><option value='Bombillos ahorradores'> Bombillos Ahorradores</option><option value='Fluorecentes(tupo largo)'>Fluorecentes(Tubo largo)</option><option value='Bombillo Led'>Bombillo Led</option><option value='Bombillo de descarga'>Bombillo de descarga</option></select>");*/

				var Cantidad_i=$("<div><label for='Cantidad_i"+cant+"'> Cantidad </label><br> <input type='number' min='0' max=200 name='Cantidad_i[]' id='Cantidad_i"+cant+"'></div>");
				var Potencia_i=$("<div><label for='Potencia_i'> Potencia (W)</label><br><input type='number' min='0' step='0.01' id='Potencia"+cant+"' name='Potencia[]' step='0.1' placeholder='W' />	</div>");
				var Horas_dia_i=$("<div><label for='Horas_dia_i'>Uso diario (h)</label><br><input type='number' min='0' max='24' step='0.1' id='Horas_dia_i"+cant+"' name='Horas_dia_i[]' /></div>");
				var Dias_uso_i=$("<div><label for='Dias_uso_i"+cant+"'> Cant Dias / semana </label><br> <input  type='number' min='0' max='7' name='Dias_uso_i[]' id='Dias_uso_i"+cant+"'></div>");
				/*var Ubicacion_i=$("<div><label for='Ubicacion"+cant+"'> Ubicación </label><br> <input  type='text' name='Ubicacion[]' id='Ubicacion"+cant+"'></div>");
				var Estado_i=$("<div><label for='Estado_i"+cant+"'> Estado </label><br> <select name='Estado_i[]' id='Estado_i"+cant+"'><option value='Seleccione'>Seleccione...</option> <option value='1'>En Uso</option> <option value='2'>Cambio por daño</option></select></div>");*/
				var boton_eliminar=$("<div style='width:10%;'><button value='"+cant+"' class='Elimin' id='Eliminar_i"+cant+"'>Eliminar</button></div>");
				
				$('#agregar_i').append(div_campo);
				$('#holitas_i'+cant).css("display","block");
				$('#holitas_i'+cant).css("text-align","center");
				$('#holitas_i'+cant).append(div_campo1);
				$('#holitas_i'+cant).append(div_campo2);

				$('#holitas_arriba'+cant).css("display","flex");
				$('#holitas_abajo'+cant).css("display","flex");


				$('#agregar_i #holitas_i'+cant+' #holitas_arriba'+cant ).append(Tipo_i);
				$('#agregar_i #holitas_i'+cant+' #holitas_arriba'+cant ).append(Cantidad_i);
				$('#agregar_i #holitas_i'+cant+' #holitas_arriba'+cant ).append(Potencia_i);
				$('#agregar_i #holitas_i'+cant+' #holitas_arriba'+cant ).append(Horas_dia_i);
				
				$('#agregar_i #holitas_i'+cant+' #holitas_abajo'+cant ).append(Dias_uso_i);
				//$('#agregar_i #holitas_i'+cant+' #holitas_abajo'+cant ).append(Ubicacion_i);
				//$('#agregar_i #holitas_i'+cant+' #holitas_abajo'+cant ).append(Estado_i);
				$('#agregar_i #holitas_i'+cant+' #holitas_abajo'+cant ).append(boton_eliminar);


				$('#Eliminar_i'+cant).click(function(e){
					var v=$(this).val();
					$('#holitas_i'+v).remove();
				});
				

			});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// ACCIONES PARA GUARDAR DATOS DE CADA UNA DE LAS FUENTES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$('#formulario_huella_fuentes_fijas').submit(function(e){
			$.ajax({
	      				url: "../datos/anadir_alcance1.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data:$("#formulario_huella_fuentes_fijas").serialize(),
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#informaciones_f_f').html(data);
	        				$('#tabla_fuente_fija').load("../datos/Mostrar1.php",{s:"<?=$_POST['s'];?>"});	        				
	        				$('#agregar_f_f').empty();
	        				

	      				}
	    				});

		});

			$.ajax({
	      				url: "../datos/Mostrar1.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data: {s:"<?=$_POST['s'];?>"},
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#tabla_fuente_fija').html(data);
	      				}
	    				});
//-----------------------------------------------------------------------------------------------------------------------------------//			
		$('#Guardar_huella_f_f_e').click(function(e){
			$.ajax({
	      				url: "../datos/anadir_f_f_e.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data:$("#fuentes_fijas_electricas").serialize(),
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#informaciones_f_f_e').html(data);
	        				$('#tabla_fuente_fija_electrica').load("../datos/Mostrar2.php",{s:"<?=$_POST['s'];?>"});
	      				}
	    				});
		});
		$.ajax({
	      				url: "../datos/Mostrar2.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data:{s:"<?=$_POST['s'];?>"},
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#tabla_fuente_fija_electrica').html(data);
	      				}
	    				});

//-----------------------------------------------------------------------------------------------------------------------------------//		
		$('#Guardar_huella_f_m').click(function(e){
			$.ajax({
	      				url: "../datos/anadir_alcance1_f_m.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data:$("#formulario_huella_fuentes_moviles").serialize(),
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#informaciones_f_m').html(data);
	        				$('#tabla_fuente_movil').load("../datos/Mostrar3.php",{s:"<?=$_POST['s'];?>"});
	      				}
	    				});
		});
		$.ajax({
	      				url: "../datos/Mostrar3.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data:{s:"<?=$_POST['s'];?>"},
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#tabla_fuente_movil').html(data);
	      				}
	    				});
//--------------------------------------------------------------------------------------------------------------------------------------//		
		$('#Guardar_huella_f_m_e').click(function(e){
			$.ajax({
	      				url: "../datos/anadir_alcance1_f_m_e.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data:$("#formulario_huella_fuentes_moviles_electricos").serialize(),
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#informaciones_f_m_e').html(data);
	        				$('#tabla_fuente_movil_electrico').load("../datos/Mostrar4.php",{s:"<?=$_POST['s'];?>"});
	      				}
	    				});
		});
		$.ajax({
	      				url: "../datos/Mostrar4.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data:{s:"<?=$_POST['s'];?>"},
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#tabla_fuente_movil_electrico').html(data);
	      				}
	    				});
//--------------------------------------------------------------------------------------------------------------------------------------//		
		$('#Guardar_huella_i').click(function(e){
			$.ajax({
	      				url: "../datos/anadir_alcance1_i.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data:$("#formulario_huella_iluminarias").serialize(),
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#informaciones_i').html(data);
	        				$('#tabla_fuente_luminaria').load("../datos/Mostrar5.php",{s:"<?=$_POST['s'];?>"});
	      				}
	    				});
		});
		
		$.ajax({
	      				url: "../datos/Mostrar5.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data:{s:"<?=$_POST['s'];?>"},
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#tabla_fuente_luminaria').html(data);
	      				}
	    				});
//--------------------------------------------------------------------------------------------------------------------------------------//		
		$('#Guardar_huella_extintor').click(function(e){
			$.ajax({
	      				url: "../datos/anadir_alcance1_extintor.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data:$("#formulario_huella_extintor").serialize(),
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#informaciones_extintor').html(data);
	        				$('#tabla_fuente_extintor').load("../datos/Mostrar6.php",{s:"<?=$_POST['s'];?>"});
	        				//$('#extintor_CO2').val("");
							//$('#extintor_r123').val("");
	      				}
	    				});
		});
		
		$.ajax({
	      				url: "../datos/Mostrar6.php",
	      				type: "POST",
	     				 dataType:"html",
	     				 data:{s:"<?=$_POST['s'];?>"},
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#tabla_fuente_extintor').html(data);
	      				}
	    				});
		
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////******   ELIMINACION *****///////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		$('#Eliminar_f_f_S').click(function(e){
			
			var listado_codigos=[];
			var contar=0;
			$('#tabla_fuente_fija input[type=checkbox]:checked').each(function() {
				
    			console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") Seleccionado");
    			listado_codigos[contar]=$(this).val();
    			contar++;
    			

			});
			if(contar=0)
			{
				$('#div_de_eliminacion').html("No hay maquinas seleccionadas");
	        	$('#div_de_eliminacion').modal();
			}else{

				var div_grande=document.createElement("div");
				div_grande.id="div_de_eliminacion";
				$('#informaciones_f_f').append(div_grande);
				$.ajax({
	      				url: "../datos/modal_f_f.php?f=f_f",
	      				type: "POST",
	     				 dataType:"html",
	     				 data: {codigo:listado_codigos,s:"<?=$_POST['s'];?>"},
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#div_de_eliminacion').html(data);
	        				$('#div_de_eliminacion').modal();
	        				
	      				}
	    				});			
				/*
				for (var i = 0; i < listado_codigos.length; i++) {
					console.log(listado_codigos[i]);
					$.ajax({
	      					url: "../datos/actualizar_f_f.php",
	      					type: "POST",
	     					 dataType:"html",
	     					 data: {codigo:listado_codigos[i]},
	      					success: function (data) {
	      					  	console.log(data);
	        					alert("ok"+[i]);
	      					}
	    					});
						
				}*/
			}

		});
//-------------------------------------------------------------------------------------------------------------------------------------//		
		$('#Eliminar_f_f_e_S').click(function(e){
			
			var listado_codigos=[];
			var contar=0;
			$('#tabla_fuente_fija_electrica input[type=checkbox]:checked').each(function() {
				
    			console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") Seleccionado");
    			listado_codigos[contar]=$(this).val();
    			contar++;
    			

			});

			var div_grande=document.createElement("div");
			div_grande.id="div_de_eliminacion";
			$('#informaciones_f_f_e').append(div_grande);
			$.ajax({
	      				url: "../datos/modal_f_f.php?f=f_f_e",
	      				type: "POST",
	     				 dataType:"html",
	     				 data: {codigo:listado_codigos,s:"<?=$_POST['s'];?>"},
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#div_de_eliminacion').html(data);
	        				$('#div_de_eliminacion').modal();
	        				
	      				}
	    				});

		});
//--------------------------------------------------------------------------------------------------------------------------------------//
		$('#Eliminar_f_m_S').click(function(e){
			

			var listado_codigos=[];
			var contar=0;
			$('#tabla_fuente_movil input[type=checkbox]:checked').each(function() {
				
    			console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") Seleccionado");
    			listado_codigos[contar]=$(this).val();
    			contar++;
    			

			});

			var div_grande=document.createElement("div");
			div_grande.id="div_de_eliminacion";
			$('#informaciones_f_m').append(div_grande);
			$.ajax({
	      				url: "../datos/modal_f_f.php?f=f_m",
	      				type: "POST",
	     				 dataType:"html",
	     				 data: {codigo:listado_codigos,s:"<?=$_POST['s'];?>"},
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#div_de_eliminacion').html(data);
	        				$('#div_de_eliminacion').modal();
	        				
	      				}
	    				});

		});

//--------------------------------------------------------------------------------------------------------------------------------------//
		$('#Eliminar_f_m_e_S').click(function(e){
			

			var listado_codigos=[];
			var contar=0;
			$('#tabla_fuente_movil_electrico input[type=checkbox]:checked').each(function() {
				
    			console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") Seleccionado");
    			listado_codigos[contar]=$(this).val();
    			contar++;
    			

			});

			var div_grande=document.createElement("div");
			div_grande.id="div_de_eliminacion";
			$('#informaciones_f_m_e').append(div_grande);
			$.ajax({
	      				url: "../datos/modal_f_f.php?f=f_m_e",
	      				type: "POST",
	     				 dataType:"html",
	     				 data: {codigo:listado_codigos,s:"<?=$_POST['s'];?>"},
	      				success: function (data) {
	      				  	console.log(data);
	        				$('#div_de_eliminacion').html(data);
	        				$('#div_de_eliminacion').modal();
	        				
	      				}
	    				});

		});


		
		
</script>
<div>
<center><h2>INGRESO DE INFORMACIÓN INICIAL DEL PROCESO PRODUCTIVO</h2></center><br>
<p style="color: black; font-size: 1vw !important; text-align: justify;">
A continuación te invitamos a registrar la información correspondiente a los equipos usados en el proceso productivo de la empresa de acuerdo al alcance correspondiente, por sede y/o sucursal.
¡Recuerda, de la precisión y exactitud de la información registrada en nuestra plataforma depende el resultado… Adelante!
</p>
</div><br>
<div style="border: #0095AA solid 1px; border-radius: 25px; width: 100%;padding: 25px 0px;">
	<form method="POST" action="javascript:Guardar_huella.focus();" id="formulario_huella_fuentes_fijas">
		<div id="informaciones_f_f" style="width: 100%;"></div>
		<center><h3>Alcance 1 Fuentes Fijas</h3></center><br>	
		<p style="color: black; font-size: 1.2vw;">En este espacio debemos registrar los equipos usados en la empresa que consuman combustibles provenientes de fuentes fósiles y se encuentren en las instalaciones de la empresa. </p>
		
		<div id="tabla_fuente_fija">
			
		</div>
		<button style=" margin-left: 5%;" id="Añadir_f_f" class="agregar">Agregar</button>
		<button style="" id="Eliminar_f_f_S" class="eliminar">Eliminar</button>
		<br>
			<div id="agregar_f_f" style="width: 90%; margin-left: 5%;">	
	
			</div>	
			<input type="text" name="cant" id="cant"value="" hidden="" >
			<input type="text" name="sede" value="<?=$_POST['s'];?>" hidden="" >
			<input style=" margin-left: 5%; margin-top: 2vw; " disabled="" type="submit" name="Guardar_huella" id="Guardar_huella" value="Guardar">
	
	</form>
</div>
<div style="margin-top:5vw;border: #0095AA solid 1px; border-radius: 25px; width: 100%;padding: 25px 0px;">
	<form method="POST" action="javascript:Guardar_huella_extintor.focus();" id="formulario_huella_extintor">
		<div id="informaciones_extintor" style="width: 100%;"></div>
		
		<center><h3>Registro de extintores</h3></center><br>
		<div><p style="color: black; text-align: justify; font-size: 1vw; margin-left: 5%;">Debemos registrar la cantidad de extintores  que existen en las instalaciones de la empresa, de tipo CO2 y HCFC 123.</p></div>
		<div id="tabla_fuente_extintor">
			
		</div>
		<br>

			
			<div>
				<table>
					<tr>
						
						<td width="50%">
							<label for="extintor_CO2">Extintor CO2</label><input type="text" name="cod_1" value="1001" hidden=""><br>
							<img src="../../../images/extintorCo2.jpg" style='width:60%; height:20vw;'><br><br>		
						</td>
						<td width="50%">
							<br>	
							<label for="extintor_r123">Extintor R-123</label><br>	
							<img src="../../../images/extintorR-123.jpg" style='width:60%; height:20vw;'><br>							
						<td>
					</tr>
				</table>
				<table>
					<tr>
						<th>Tipo Extintor</th>
						<th>Cantidad</th>
						<th>Peso</th>
					</tr>
					<tr>
						<td>
							<select name="tipo_extintor" id="tipo_extintor">
								<option value="seleccione">Seleccione</option>
								<option value="1001">Extintor CO2</option>
								<option value="1002">Extintor R123/HCFC 123</option>
							</select>
						</td>
						<td>
							<input type="number" step="0" required="" name="Cantidad" id="Cantidad">
						</td>
						<td>
							<input type="number" step="0.01" min="2.00" max="500.00" name="Peso" id="Peso"> <label for="Peso"> KG</label>
						</td>
					</tr>
					
				</table>
			</div>
			<input type="text" name="sede" value="<?=$_POST['s'];?>" hidden="" >
			<input style=" margin-left: 5%; margin-top: 2vw;"  type="submit" name="Guardar_huella_extintor" id="Guardar_huella_extintor" value="Guardar">
	
	</form>
</div>
<div style="margin-top:5vw;border: #0095AA solid 1px; border-radius: 25px; width: 100%;padding: 25px 0px;">
	<form method="POST" action="javascript:Guardar_huella_f_f_e.focus();" id="fuentes_fijas_electricas">
		<div id="informaciones_f_f_e" style="width: 100%;"></div>
		<center><h3>Alcance 2(Fuentes fijas) Maquinarias Electricas</h3></center>
		<p style="color: black!important; font-size: 1vw !important; text-align: justify;">	En este espacio debemos registrar los equipos usados en la empresa que consuman Energía eléctrica y se encuentren en las instalaciones de la empresa.</p>
		<br>
		<div id="tabla_fuente_fija_electrica">
			
		</div>
		<button style=" margin-left: 5%;" id="Añadir_f_f_e" class="agregar">Agregar</button>
		<button style="" id="Eliminar_f_f_e_S" class="eliminar">Eliminar</button>	
		<br>
			<div id="agregar_f_f_e" style="width: 90%; margin-left: 5%;">
			
	
			</div>	
			<input type="text" name="cant" id="cant"value="" hidden="" >
			<input type="text" name="sede" value="<?=$_POST['s'];?>" hidden="" >
			<input style=" margin-left: 5%; margin-top: 2vw;" disabled="" type="submit" name="Guardar_huella_f_f_e" id="Guardar_huella_f_f_e" value="Guardar">
	
	</form>
</div>
<br>
<div>
	<h2><center>Fuentes Moviles</center></h2>
	<p style="color: black!important; font-size: 1vw !important; text-align: justify;">En este espacio debemos registrar los vehículos usados por la empresa que consuman combustibles provenientes de fuentes fósiles, también los híbridos (Gas - Gasolina -ACPM). </p>
</div>
<div style="margin-top:5vw;border: #0095AA solid 1px; border-radius: 25px; width: 100%;padding: 25px 0px;">
	<form method="POST" action="javascript:Guardar_huella_f_m.focus();" id="formulario_huella_fuentes_moviles">
		<div id="informaciones_f_m" style="width: 100%;"></div>
		
		<center><h3>Alcance 1 Automotores</h3></center><br>
		<div id="tabla_fuente_movil">
			
		</div>
		<button style=" margin-left: 5%;" id="Añadir_f_m" class="agregar">Agregar</button>
		<button style="" id="Eliminar_f_m_S" class="eliminar">Eliminar</button>
		<br>
			<div id="agregar_f_m" style="width: 90%; margin-left: 5%;">	
	
			</div>	
			<input type="text" name="cant" id="cant"value="" hidden="" >
			<input type="text" name="sede" value="<?=$_POST['s'];?>" hidden="" >
			<input style=" margin-left: 5%; margin-top: 2vw;" disabled="" type="submit" name="Guardar_huella_f_m" id="Guardar_huella_f_m" value="Guardar">
	
	</form>
</div>
<div style="margin-top:5vw;border: #0095AA solid 1px; border-radius: 25px; width: 100%;padding: 25px 0px;">
	<form method="POST" action="javascript:Guardar_huella_f_m_e.focus();" id="formulario_huella_fuentes_moviles_electricos">
		<div id="informaciones_f_m_e" style="width: 100%;"></div>
		<center><h3>Alcance 2 Automotores Electricos</h3></center><br>
		<center><h4>Si el vehiculo es un hibrido, debe registrarlo en la sección anteriror (combustible fosil) y despues si lo registra en esta sección</h4></center>
		<div id="tabla_fuente_movil_electrico">
			
		</div>
		<button style=" margin-left: 5%;" id="Añadir_f_m_e" class="agregar">Agregar</button>
		<button style="" id="Eliminar_f_m_e_s" class="eliminar">Eliminar</button>
		<br>
			<div id="agregar_f_m_e" style="width: 90%; margin-left: 5%;">	
	
			</div>	
			<input type="text" name="cant" id="cant"value="" hidden="" >
			<input type="text" name="sede" value="<?=$_POST['s'];?>" hidden="" >
			<input style=" margin-left: 5%; margin-top: 2vw;" disabled="" type="submit" name="Guardar_huella_f_m_e" id="Guardar_huella_f_m_e" value="Guardar">
	
	</form>
</div>	
<div style="margin-top:5vw;border: #0095AA solid 1px; border-radius: 25px; width: 100%;padding: 25px 0px;">
	<form method="POST" action="javascript:Guardar_huella_i.focus();" id="formulario_huella_iluminarias">
		<div id="informaciones_i" style="width: 100%;"></div>
		
		<center><h3>Alcance 2 Luminarias</h3></center><br>
		<div id="tabla_fuente_luminaria">
			
		</div>
		<button style=" margin-left: 5%;" id="Añadir_i" class="agregar">Agregar</button>
		<br>

			<div id="agregar_i" style="width: 90%; margin-left: 5%;">	
	
			</div>	
			<input type="text" name="cant" id="cant"value="" hidden="" >
			<input type="text" name="sede" value="<?=$_POST['s'];?>" hidden="" >
			<input style=" margin-left: 5%; margin-top: 2vw;" disabled="" type="submit" name="Guardar_huella_i" id="Guardar_huella_i" value="Guardar">
	
	</form>
</div>




	
