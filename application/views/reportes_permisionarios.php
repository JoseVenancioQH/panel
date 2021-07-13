<?php

// create new PDF document
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Autotransportes de la Baja California');
$pdf->SetTitle('Reporte Control de Placas');
$pdf->SetSubject('Reporte Control de Placas ABC');
$pdf->SetKeywords('Control, PLACAS, reportes, ABC, abc');

// PDF_HEADER_TITLE="Reporte Control de Placas";

// set default header data
$pdf->SetHeaderData(/*PDF_HEADER_LOGO*/"logo.png", /*PDF_HEADER_LOGO_WIDTH*/15, /*PDF_HEADER_TITLE*/"Reporte Control de Placas", /*PDF_HEADER_STRING*/"Autotransportes de la Baja California - ABC");

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 15);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Estado Financiero Permisionarios', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 6);

// -----------------------------------------------------------------------------

/*$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    <tr>
        <td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
        <td>COL 3 - ROW 2</td>
    </tr>
    <tr>
       <td>COL 3 - ROW 3</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3<br />text line<br />text line<br />text line<br />text line<br />text line<br />text line</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    <tr>
        <td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
         <td>COL 3 - ROW 2</td>
    </tr>
    <tr>
       <td>COL 3 - ROW 3</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3<br />text line<br />text line<br />text line<br />text line<br />text line<br />text line</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    <tr>
        <td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
         <td>COL 3 - ROW 2<br />text line<br />text line</td>
    </tr>
    <tr>
       <td>COL 3 - ROW 3</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

$tbl = <<<EOD
<table border="1">
<tr>
<th rowspan="3">Left column</th>
<th colspan="5">Heading Column Span 5</th>
<th colspan="9">Heading Column Span 9</th>
</tr>
<tr>
<th rowspan="2">Rowspan 2<br />This is some text that fills the table cell.</th>
<th colspan="2">span 2</th>
<th colspan="2">span 2</th>
<th rowspan="2">2 rows</th>
<th colspan="8">Colspan 8</th>
</tr>
<tr>
<th>1a</th>
<th>2a</th>
<th>1b</th>
<th>2b</th>
<th>1</th>
<th>2</th>
<th>3</th>
<th>4</th>
<th>5</th>
<th>6</th>
<th>7</th>
<th>8</th>
</tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// Table with rowspans and THEAD
$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2">
<thead>
 <tr style="background-color:#FFFF00;color:#0000FF;">
  <td width="30" align="center"><b>A</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="80" align="center"> <b>XXXX</b></td>
  <td width="80" align="center"><b>XXXX</b></td>
  <td width="45" align="center"><b>XXXX</b></td>
 </tr>
 <tr style="background-color:#FF0000;color:#FFFF00;">
  <td width="30" align="center"><b>B</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="80" align="center"> <b>XXXX</b></td>
  <td width="80" align="center"><b>XXXX</b></td>
  <td width="45" align="center"><b>XXXX</b></td>
 </tr>
</thead>
 <tr>
  <td width="30" align="center">1.</td>
  <td width="140" rowspan="6">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center" rowspan="3">2.</td>
  <td width="140" rowspan="3">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80">XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80" rowspan="2" >RRRRRR<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center">3.</td>
  <td width="140">XXXX1<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center">4.</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// NON-BREAKING TABLE (nobr="true")

$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2" nobr="true">
 <tr>
  <th colspan="3" align="center">NON-BREAKING TABLE</th>
 </tr>
 <tr>
  <td>1-1</td>
  <td>1-2</td>
  <td>1-3</td>
 </tr>
 <tr>
  <td>2-1</td>
  <td>3-2</td>
  <td>3-3</td>
 </tr>
 <tr>
  <td>3-1</td>
  <td>3-2</td>
  <td>3-3</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2" align="center">
 <tr nobr="true">
  <th colspan="3">NON-BREAKING ROWS</th>
 </tr>
 <tr nobr="true">
  <td>ROW 1<br />COLUMN 1</td>
  <td>ROW 1<br />COLUMN 2</td>
  <td>ROW 1<br />COLUMN 3</td>
 </tr>
 <tr nobr="true">
  <td>ROW 2<br />COLUMN 1</td>
  <td>ROW 2<br />COLUMN 2</td>
  <td>ROW 2<br />COLUMN 3</td>
 </tr>
 <tr nobr="true">
  <td>ROW 3<br />COLUMN 1</td>
  <td>ROW 3<br />COLUMN 2</td>
  <td>ROW 3<br />COLUMN 3</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');*/

$PagosPermisionarios = $this->reportes_permisionarios_module->get_buscar_permisionarios(
                                                                                          $id_permisionario,
                                                                                          $id_unidad,
                                                                                          $id_operador,
                                                                                          $id_placa,
                                                                                          $permisionario_tabulador,
                                                                                          $permisionario_fecha
                                                                                        );
$cadConcat = "";

if(!empty($PagosPermisionarios)){  

    date_default_timezone_set('America/Tijuana');
    $datetime2 = new DateTime(); 

    $diasMes = 30;//date('t');//dias del Mes           

    foreach($PagosPermisionarios as $rowReportesPermisionarios){

      $banfiltro = true;

      $datetime1 = new DateTime($rowReportesPermisionarios->cat_vincularpermisionario_fechainicio);                
      $interval = $datetime1->diff($datetime2);

      //validar los dias de condono /////////////////////////////////////////////
      $intervalFecha = explode('-',$interval->format('%m-%d'));

      $intervalMes = $intervalFecha[0];
      $intervalDias = $intervalFecha[1];                            

      if($intervalMes>0){///meses completos
          $intervaloReal = $coeficiente = 0;
          $pagoReal = (float)$rowReportesPermisionarios->cat_cobros_nombre*(float)$rowReportesPermisionarios->cat_periodopago_periodo;

          if($rowReportesPermisionarios->cat_periodopago_periodo<1){//si es menor a un mes
              $intervaloReal = (int)$coeficiente = ($intervalDias/($diasMes*$rowReportesPermisionarios->cat_periodopago_periodo));                                    
          }

          $intervaloReal += ((int)($intervalMes / $rowReportesPermisionarios->cat_periodopago_periodo));
      }else{//dias, antes de un mes completo                                
          $pagoReal = (float)$rowReportesPermisionarios->cat_cobros_nombre*(float)$rowReportesPermisionarios->cat_periodopago_periodo;
          $intervaloReal = ((float)($intervalMes / $rowReportesPermisionarios->cat_periodopago_periodo));                                

          $intervaloReal  += (int)$coeficiente = ($intervalDias/($diasMes*$rowReportesPermisionarios->cat_periodopago_periodo));
      }

      //obtengo la parte fraccionaria del coeficiente//////////////
      $fracc=explode('.',(string)$coeficiente); 
      $numFracc = "0.".(isset($fracc[1])?$fracc[1]:"0");
      /////////////////////////////////////////////////////////////

      $diasSobrantes = (int)($numFracc*($diasMes*(float)$rowReportesPermisionarios->cat_periodopago_periodo));
      
      if(($diasSobrantes<=$rowReportesPermisionarios->cat_periodopago_diascondonados)){
          $intervaloReal = ($intervaloReal!=0)?$intervaloReal - 1:0;
      }
      ///////////////////////////////////////////////////////////////////////////

      $pagoPrint = $pagoReal*(((int)$intervaloReal==0)?(((float)$rowReportesPermisionarios->cat_periodopago_periodo<=0.03)?1:$intervaloReal):$intervaloReal);
      $deuda = (float)$pagoPrint - (float)$rowReportesPermisionarios->reg_pagospermisionarios_monto_cobro;
      $recargos = $deuda * (float)$rowReportesPermisionarios->cat_cobros_porcentajedecimal;
      $deudaPeriodo = $intervaloReal-$rowReportesPermisionarios->numreg;

      switch ($reportes_permisionarioStatus) {
          case "aldia":
            if((int)$deuda>0){$banfiltro = false;}
              break;
          case "deudores":
              if((int)$deuda<=0){$banfiltro = false;}
              break;
      }

      if($banfiltro){

              $cadConcat .= "<tr style=\"background-color:#d0dbf1;color:#333333;\">";	                             
              $cadConcat .= "<td>".$rowReportesPermisionarios->cat_permisionario_nombre."</td>";
              $cadConcat .= "<td>".$rowReportesPermisionarios->cat_unidades_numeconomico."</td>";
              $cadConcat .= "<td>".$rowReportesPermisionarios->cat_operadores_nombre."</td>";
              $cadConcat .= "<td>".$rowReportesPermisionarios->cat_placas_numero."</td>";
              $cadConcat .= "<td>".$rowReportesPermisionarios->cat_periodopago_nombre."<br>Dias Condonados: ".$rowReportesPermisionarios->cat_periodopago_diascondonados."</td>";
              $cadConcat .= "<td>Ini.: ".$rowReportesPermisionarios->cat_vincularpermisionario_fechainicio." Trans.:<br> M: ".$intervalMes.", D:".$intervalDias."</td>";
              $cadConcat .= "<td>$".number_format($rowReportesPermisionarios->cat_cobros_nombre,2)."</td>";
              $cadConcat .= "<td>$".number_format($rowReportesPermisionarios->pagorenta,2)." (".$rowReportesPermisionarios->numreg." Pagos) "."</td>";
              $cadConcat .= "<td>$".number_format($pagoPrint,2)." (".$intervaloReal." ".$rowReportesPermisionarios->cat_periodopago_nombre.")</td>";
              $cadConcat .= "<td>$".number_format($deuda,2)."</td>";
              $cadConcat .= "<td>$".number_format($recargos,2)."</td></tr>";
              $cadConcat .= "<tr><th style=\"background-color:#d0dbf1;\" colspan=\"11\" align=\"center\">Pagos Realizados</th></tr>";
              
              foreach(json_decode("[".$rowReportesPermisionarios->pagos."]",true) as $key=>$pago){
                  $cadConcat .= "<tr class=\"reportes_permisionarios_pagos pagos_permisionarios_".$rowReportesPermisionarios->cat_vincularpermisionario_id_vincularpermisionario."\">";
                  $cadConcat .= "<td align=\"center\">".(isset($pago['consecutivo'])?$pago['consecutivo']:"")."</td>";                     
                  $cadConcat .= "<td>$".(is_numeric($pago['monto'])?number_format($pago['monto'],2):"")."</td>";
                  $cadConcat .= "<td colspan=\"2\" align=\"center\">".(isset($pago['fecha'])?$pago['fecha']:"")."</td>";		              
                  $cadConcat .= "<td align=\"center\">".(isset($pago['tipo'])?$pago['tipo']:"")."</td>";             
                  $cadConcat .= "<td ></td>";
                  $cadConcat .= "<td></td>";
                  $cadConcat .= "<td></td>";
                  $cadConcat .= "<td></td>";
                  $cadConcat .= "<td></td>";
                  $cadConcat .= "<td></td>";
                  $cadConcat .= "<td></td></tr>";
              }
              $cadConcat .= "<tr><th colspan=\"11\" align=\"center\">Pagos Realizados</th></tr>";

      }
      
    }    
}

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
	<thead>
	<tr style="background-color:#ecf0f5;color:#333333;">	    
	    <th>Permisionarios</th>
	    <th>Unidad</th>
	    <th>Operador</th>
	    <th>Placa</th>
	    <th>Periodo Pago</th>
	    <th>Fechas Inicio</th>           
	    <th>Cobro</th>
	    <th>Pagado</th>
	    <th>Acumulado</th>
	    <th>Deuda</th>
	    <th>Recargos</th>	    
	</tr>
	</thead>
	<tbody style="font-size: 10px;">	
	$cadConcat
	</tbody>
	<tfoot>
	<tr style="background-color:#ecf0f5;color:#333333;">	    
	    <th>Permisionarios</th>
	    <th>Unidad</th>
	    <th>Operador</th>
	    <th>Placa</th>
	    <th>Periodo Pago</th>
	    <th>Fechas</th>           
	    <th>Cobro</th>
	    <th>Pagado</th>
	    <th>Acumulado</th>
	    <th>Deuda</th>
	    <th>Recargos</th>	    
	</tr>
	</tfoot>
	</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Reporte-Permisionario.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+