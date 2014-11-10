<?php

/**
 * @project XG Proyect
 * @version 2.10.x build 0000
 * @copyright Copyright (C) 2008 - 2012
 */

if(!defined('INSIDE')) {die(header("location:../../"));}

class ShowPortalPage
{
	function __construct ( $CurrentUser)
	{
		global  $lang , $user ;
			$parse['dpath']			= DPATH;

$query = doquery("SELECT * FROM {{table}}", 'serv');

	$i = 0;

	while ($u = mysql_fetch_array($query))
	{
		$i++;

		$medelo_bd		         .= $u['id'] ;
		$conecion_bd             .= $u['medelo'] ; 
		$vcg                     .= $u['tabla'] ;
		$conecion                .= $u['conecion'] ;
		$servidor_bd		     .= $u['servidor'] ;
		$usuario_bd 		     .= $u['usuario'] ;
		$seguridad_bd 	         .= $u['seguridad'] ;
		$activado 		         .= $u['activado'] ;
		$type 			         .= $u['type'] ;
		$tablavcg                .= $vcg."_users";

///no tocar esta parte
$medelo_bd=mysql_connect($servidor_bd , $usuario_bd, $seguridad_bd);
mysql_select_db($conecion_bd,$medelo_bd) OR DIE ("Error: No es posible establecer la conexión");

//sacamos datos del usuario  
$query = doquery("SELECT * FROM ogp_users WHERE username = '".$CurrentUser['username']."'", 'users');
  while($users = mysql_fetch_array($query))
    {
		$nombrejuador["$medelo_bd"]        .=  "".$users[username]."";
		$user["$medelo_bd"]                .=  "".$users[password]."";
		$id["$medelo_bd"]                  .=  "".$users[id]."";
		$email["$medelo_bd"]               .=  "".$users[email]."";
    }
	
// sacamos datos de las estadisticas 
$query = doquery("SELECT * FROM ogp_statpoints WHERE id_owner = '".$id["$medelo_bd"]."'", 'statpoints');
 //separamos y cojemos los necesarios
  while($statpoints = mysql_fetch_array($query))
    {
		$p_totales["$medelo_bd"]         .=  $statpoints[22];
		$p_flota["$medelo_bd"]      	 .=  $statpoints[fleet_points];
		$p_ran["$medelo_bd"]         	 .=  $statpoints[20];
		//<td>".$p_ran["$medelo_bd"]."</td>
    }


//ya los podemos usar las estadisticas del usuario
/* if ($CurrentUser["email"] == $email["$medelo_bd"]  ) {
	 
                   $parse['accion'] .= "portal/entrar";					
				   $parse['estadisticas'] .= " estas en la pocicion :".$p_ran["$medelo_bd"]." </p>con una puntuacion de :".$p_totales["$medelo_bd"]."</p>Puntuacion ejercito:".$p_flota["$medelo_bd"]."</p>";
                } else {

                   $parse['accion'] .= "portal/registar";
				   $parse['estadisticas'].= "no te puedo mostrar las estadisticas </p> porque no estas Registrado</p>registrate tansolo pulsando el boton";
                }
	/*		*/	
if ($CurrentUser["email"] == $email["".$medelo_bd.""]  ) 
{
/***/	
{	
for($i=0;$p_ran["".$medelo_bd.""][$i];$i++)
/***/
	$parse['estadisticas1'] .= 
	"<br>estas en la pocicion :".$p_ran["".$medelo_bd.""][$i]."<br>";	


 $parse["imgserver"] .= "<img src=\"".DPATH."img/server.png\" >";
 /****/
 
  $parse["entrar"] .= "

 <form action=\"../vcg0.0.1/index_portal.php\" method=\"post\" target=\"_blank\">
       
 <input type=\"hidden\" name=\"email\" value=\"".$CurrentUser["email"]."\" />
 
 <input type=\"hidden\" name=\"usuario\" value=\"".$CurrentUser["username"]."\" />
 
  <input type=\"hidden\" name=\"contrasena\" value=\"".$CurrentUser["password"]."}\" />
  
   <input alt=\" submit\" src=\"".DPATH."interface/portal/entrar.png\"\" type=\"image\" />
 
</form>";
 /*****/
 }
}else {
	 $parse['tabla'] .= "
<tr>
<td>1</td>
<td>2</td>
<td>3</td>
</tr>	";			  
 }
/*termina aqui*/
$parse ["usuario"]        .= $CurrentUser["username"];
$parse ["email"]          .= $CurrentUser["email"];
$parse ["contrasena"]     .= $CurrentUser["password"];

/****/	
}

/****/
$parse ['dpath']          = DPATH ;

			
   //$palabras2=explode(" ","hola como estas yo me llamo joel",3);

//for($i=0;$p_ran["$medelo_bd"][$i];$i++)
//echo "<br>".$p_ran["$medelo_bd"][$i],"<br>";
/***/

				return display(parsetemplate(gettemplate('Portal/Portal_body'),$parse));
				break;
		}
	}

			
		
?>