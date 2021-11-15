<?php

/* require 'D:/Softwares/Programacao/Web/XAMPP/htdocs/GestaoPerfomance/vendor/autoload.php'; */
require './vendor/autoload.php';

use JasperPHP\JasperPHP;

   function getDatabaseConfigMysql()
   {
       return [
           'driver'   => 'mysql',
           'host'     => '127.0.0.1',
           'port'     => '3306',
           'username' => 'root',
           'password' => '',
           'database' => 'smartfast'
       ];
   }

   function generateReport($request)
   {   
    switch ($request['titulo_relatorio']) {
      case 'Tempo Médio Tipo de Infraestrutura por Quantidade de Pessoas':
        $arrayParam = array(
          $request['titulo_relatorio'],
          $request['datainicial'],
          $request['datafinal']
        );
        break;
      case 'Tempo Médio Quantidade de Pessoas por Tipo de Infraestrutura':
        $arrayParam = array(
          $request['titulo_relatorio'],
          $request['datainicial'],
          $request['datafinal']
        );
        break;
      case 'Tempo Médio por Projeto':
        $arrayParam = array(
          $request['titulo_relatorio'],
          $request['datainicial'],
          $request['datafinal']
        );
        break;
      case 'Total Instalado por Projeto':        
        $arrayParam = array(
          'titulo_relatorio' => $request['titulo_relatorio'],
          'datainicial' => $request['datainicial'],
          'datafinal' => $request['datafinal']
        );
        break;
      case 'Instalado do Projeto por Dia':
        $arrayParam = array(
          $request['titulo_relatorio'],
          $request['codigoprojeto'],
          $request['datainicial'],
          $request['datafinal']
        );
        break;
    }
    $jasper = new JasperPHP;
    $extensao = 'pdf' ;
    $nome = 'teste';
    $filename =  $nome  . time();
    $inputCompile = __DIR__ . '/reports/' . $nome . '.jrxml';
    $inputProcess = __DIR__ . '/reports/' . $nome . '.jasper';
    $output = __DIR__ . '/reports/' . $filename;
    $jasper->compile($inputCompile)->execute();
    echo
    $jasper->process(
      $inputProcess,
      $output,
      array($extensao),
      $arrayParam,
      getDatabaseConfigMysql(),
      true,
      true,
      "pt_BR"
    )->output();

    /* $PDFfile = $output . "." . $extensao;
    header("Content-type: application/pdf");
    header("Content-Length: " . filesize($PDFfile));
    readfile($PDFfile); */
    };