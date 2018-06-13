<?php


function productos_json(&$pases, &$entrada_sagrada = 0, &$entrada_guell = 0)
{ //paso por referencia, para que los datos sigan existiendo. pase siempre habrá uno, pero en los otros puede que no así que valor por defecto 0
  $dias = array(0 => 'un_dia', 1 => 'pase_traslado', 2 => 'pase_rutas');

  unset($pases['un_dia']['precio']);
  unset($pases['completo']['precio']);
  unset($pases['2dias']['precio']);

  $total_pases = array_combine($dias, $pases); //para combinar los arrays de arriba y hacerlos como "asociativos", es decir, que la key sea un_dia, pase_traslado y pase_ruta en lugar de 0, 1 y 2
  //$json = array();

  foreach ($total_pases as $key => $pases):
    if ((int)$pases > 0):
      $total_pases[$key] = (int)$pases;
    endif;
  endforeach;

  $entrada_sagrada = (int)$entrada_sagrada;
  if ($entrada_sagrada > 0): //para que no me entren vaciós en el JSON
    //$total_pases['entrada_sagrada'] = $entrada_sagrada;
    $total_pases['entrada_sagrada'] = $entrada_sagrada;
  endif;

  $entrada_guell = (int)$entrada_guell;
  if ($entrada_guell > 0): //para que no me entren vaciós en el JSON
    //$total_pases['entrada_guell'] = $entrada_guell;
    $total_pases['entrada_guell'] = $entrada_guell;
  endif;

  //return json_encode($total_pases);
  return json_encode($total_pases);
}

function formatear_pedido($articulos)
{
  $articulos = json_decode($articulos, true);
  $pedido = '';
  if (array_key_exists('un_dia', $articulos)):
    $pedido .= 'Pase(s) 1 día: ' . $articulos['un_dia'] . "<br/>";
  endif;
  if (array_key_exists('pase_rutas', $articulos)):
    $pedido .= 'Pase(s) 2 día: ' . $articulos['pase_rutas'] . "<br/>";
  endif;
  if (array_key_exists('pase_traslado', $articulos)):
    $pedido .= 'Pase(s) Completos: ' . $articulos['pase_traslado'] . "<br/>";
  endif;
  if (array_key_exists('entrada_sagrada', $articulos)):
    $pedido .= 'Entrada Sagrada Familia: ' . $articulos['entrada_sagrada'] . "<br/>";
  endif;
  if (array_key_exists('entrada_guell', $articulos)):
    $pedido .= 'Entrada Parc Güell: ' . $articulos['entrada_guell'] . "<br/>";
  endif;

  return $pedido;
}

function eventos_json(&$eventos)
{
  $eventos_json = array();
  foreach ($eventos as $evento):
    $eventos_json['servicios'][] = $evento;
  endforeach;

  return json_encode($eventos_json);
}

function formatear_eventos_a_sql($eventos)
{
  $eventos = json_decode($eventos, true);
  $sql = "SELECT `nombre_servicio` FROM servicios WHERE clave = 'a' ";

  foreach ($eventos['servicios'] as $evento):
    $sql .= " OR clave = '{$evento}'";
  endforeach;

  return $sql;
}

