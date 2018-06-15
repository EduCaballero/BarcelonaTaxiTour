<?php

if (!isset($_POST['submit'])) {
  exit("ERROR");
}

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require 'includes/paypal.php';


if (isset($_POST['submit'])):
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $regalo = $_POST['regalo'];
  $total = $_POST['total_pedido'];
  $fecha = date('Y-m-d H:i:s');
  // Pedidos
  $pases = $_POST['pases'];
  $numero_pases = $pases;

  $pedidoExtra = $_POST['pedido_extra'];
  $entrada_sagrada = $_POST['pedido_extra']['pedido_sagrada']['cantidad'];
  $precioSagrada = $_POST['pedido_extra']['pedido_sagrada']['precio'];
  $entrada_guell = $_POST['pedido_extra']['pedido_guell']['cantidad'];
  $precioGuell = $_POST['pedido_extra']['pedido_guell']['precio'];
  include_once 'includes/funciones/funciones.php';
  $pedido = productos_json($pases, $entrada_sagrada, $entrada_guell);
  $servicios = $_POST['registro'];
  $registro = servicios_json($servicios);
  $pagado = 0;

  /*echo "<pre>";
  var_dump($_POST);
  echo "</pre>";
  exit;
  endif;
  */

  try {
    require_once('includes/funciones/bd_conexion.php');
    $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, servicios_registrados, regalo, total_pagado, pagado) VALUES (?,?,?,?,?,?,?,?,?)");
    //ssssssis -> string,...int, string
    $stmt->bind_param("ssssssisi", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total, $pagado);
    $stmt->execute();
    $ID_registro = $stmt->insert_id;//para usarlo debajo, en paypal, en el amount
    $stmt->close();
    $conn->close();
    //header('Location: validar_registro.php?exito=1');
  } catch (Exception $e) {
    $error = $e->getMessage();
  }
endif;

$compra = new Payer();
$compra->setPaymentMethod('paypal');


$articulo = new Item();
$articulo->setName($producto)
  ->setCurrency('EUR')
  ->setQuantity(1)
  ->setPrice($precio);

$i = 0;
$arry_pedido = array();
foreach ($numero_pases as $key => $value) {
  if ((int)$value['cantidad'] > 0) {

    ${"articulo$i"} = new Item();
    $arry_pedido[] = ${"articulo$i"};
    ${"articulo$i"}->setName('Pase: ' . $key)
      ->setCurrency('EUR')
      ->setQuantity((int)$value['cantidad'])
      ->setPrice((int)$value['precio']);
    $i++;
  }
}

foreach ($pedidoExtra as $key => $value) {
  if ((int)$value['cantidad'] > 0) {
    if ($key == 'pedido_sagrada') {//para el descuento
      $precio = (float)$value['precio'] * .93;
    } else {
      $precio = (int)$value['precio'];
    }
    ${"articulo$i"} = new Item();
    $arry_pedido[] = ${"articulo$i"};
    ${"articulo$i"}->setName('Extras: ' . $key)
      ->setCurrency('EUR')
      ->setQuantity((int)$value['cantidad'])
      ->setPrice($precio);
    $i++;
  }
}


$listaArticulos = new ItemList();
$listaArticulos->setItems($arry_pedido);


$cantidad = new Amount();
$cantidad->setCurrency('EUR')
  ->setTotal($total);


$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
  ->setItemList($listaArticulos)
  ->setDescription('Pago BCNTAXITOUR ')
  ->setInvoiceNumber($ID_registro);

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?correcto=true&id_pago={$ID_registro}")
  ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?correcto=false&id_pago={$ID_registro}");


$pago = new Payment();
$pago->setIntent("sale")
  ->setPayer($compra)
  ->setRedirectUrls($redireccionar)
  ->setTransactions(array($transaccion));

try {
  $pago->create($apiContext);
} catch (PayPal\Exception\PayPalConnectionException $pce) {
  echo "<pre>";
  print_r(json_decode($pce->getData()));
  exit;
  echo "</pre>";
}

$aprobado = $pago->getApprovalLink();

header("Location: {$aprobado}");


