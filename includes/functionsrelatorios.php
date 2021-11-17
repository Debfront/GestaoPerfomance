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
      case 'Tempo Médio por Tipo de Infraestrutura':
        $nome = 'GrafTempoMedioXTipoInfra';
        $arrayParam = array(
          'titulo_relatorio' => $request['titulo_relatorio'],
          'datainicial' => $request['datainicial'],
          'datafinal' => $request['datafinal']
        );
        break;
      case 'Tempo Médio por Projeto':
        $nome = 'GrafTempoMedioXProjeto';
        $arrayParam = array(
          'titulo_relatorio' => $request['titulo_relatorio'],
          'datainicial' => $request['datainicial'],
          'datafinal' => $request['datafinal']
        );
        break;
      case 'Total Instalado por Projeto':
        $nome = 'GrafTotatInstaladoXProjeto';      
        $arrayParam = array(
          'titulo_relatorio' => $request['titulo_relatorio'],
          'datainicial' => $request['datainicial'],
          'datafinal' => $request['datafinal']
        );
        break;
      case 'Instalado do Projeto por Dia':
        $nome = 'GrafInstaladoXDiaXProjeto';
        $arrayParam = array(
          'titulo_relatorio' => $request['titulo_relatorio'],
          'codigoprojeto' => $request['codigoprojeto'],
          'datainicial' => $request['datainicial'],
          'datafinal' => $request['datafinal']
        );
        break;
        case 'Instalado do Projeto por Dia':
          $nome = 'GrafInstaladoXDiaXProjeto';
          $arrayParam = array(
            'titulo_relatorio' => $request['titulo_relatorio'],
            'codigoprojeto' => $request['codigoprojeto'],
            'datainicial' => $request['datainicial'],
            'datafinal' => $request['datafinal']
          );
        break;

        case 'Atividades em Andamento':
            $nome = 'RelAtividades';
            $arrayParam = array(
              'datainicial' => $request['datainicial'],
              'datafinal' => $request['datafinal']
            );
        break;
        case 'Atividades Finalizadas':
            $nome = 'RelAtividadesFinalizadas';
            $arrayParam = array(
              'datainicial' => $request['datainicial'],
              'datafinal' => $request['datafinal']
            );
        break;
        case 'Clientes':
            $nome = 'RelClientes';
            $arrayParam = array();
        break;
        case 'Projetos':
            $nome = 'RelProjetos';
            $arrayParam = array(
              'datainicial' => $request['datainicial'],
              'datafinal' => $request['datafinal']
            );
        break;
    }
    $jasper = new JasperPHP;
    $extensao = 'pdf' ;
    $filename =  $nome  . time();
    $inputCompile = dirname(__DIR__, 1) . '/public/reportsTemplates/' . $nome . '.jrxml';
    $output = dirname(__DIR__, 1) . '/public/Relatorios/' . $filename;
   
    /* $jasper->compile($inputCompile)->execute(); */
    $inputProcess = dirname(__DIR__, 1) . '/public/reportsTemplates/' . $nome . '.jasper';

    $jasper->process(
      $inputProcess,
      $output,
      array($extensao),
      $arrayParam,
      getDatabaseConfigMysql(),
      true,
      true,
      "pt_BR"
    )->execute();
    
    /* $name = $filename . "." . $extensao;
    $PDFfile = dirname(__DIR__, 1) . '/public/Relatorios/' . $output . "." . $extensao;
    echo $name;
    echo $PDFfile;
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename"'.$name.'"');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($PDFfile));
    header('Accept-Ranges: bytes');
    readfile($PDFfile); */



    };