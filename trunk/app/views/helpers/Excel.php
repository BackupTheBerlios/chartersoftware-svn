<?php

class ExcelHelper extends Helper {

	public function header($author=null, $company=null)
	{
		if ($author == null) $author="";
		if ($company== null) $company = "";
 		$datestr = date('Y-m-d').'T'.date('H:i:00');
		
		$header =
		'<?xml version="1.0"?>' . "\n" .
		'<?mso-application progid="Excel.Sheet"?>' . "\n" .
		'<Workbook' . "\n" .
		'   xmlns="urn:schemas-microsoft-com:office:spreadsheet"' . "\n" .
		'   xmlns:o="urn:schemas-microsoft-com:office:office"' . "\n" .
		'   xmlns:x="urn:schemas-microsoft-com:office:excel"' . "\n" .
		'   xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"' . "\n" .
		'   xmlns:html="http://www.w3.org/TR/REC-html40">' . "\n" .
		'  <DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">' . "\n" .
		'    <Author>'.$author.'</Author>' . "\n" .
		'    <LastAuthor>'.$author.'</LastAuthor>' . "\n" .
		'    <Created>'.$datestr.'</Created>' . "\n" .
		'    <Company>'.$company.'</Company>' . "\n" .
		'    <Version>11.8036</Version>' . "\n" .
		'  </DocumentProperties>' . "\n" .
		'  <ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">' . "\n" .
		'    <WindowHeight>6795</WindowHeight>' . "\n" .
		'    <WindowWidth>8460</WindowWidth>' . "\n" .
		'    <WindowTopX>120</WindowTopX>' . "\n" .
		'    <WindowTopY>15</WindowTopY>' . "\n" .
		'    <ProtectStructure>False</ProtectStructure>' . "\n" .
		'    <ProtectWindows>False</ProtectWindows>' . "\n" .
		'  </ExcelWorkbook>' . "\n" .
		'  <Styles>' . "\n" .
		'    <Style ss:ID="Default" ss:Name="Normal">' . "\n" .
		'      <Alignment ss:Vertical="Bottom" />' . "\n" .
		'      <Borders />' . "\n" .
		'      <Font />' . "\n" .
		'      <Interior />' . "\n" .
		'      <NumberFormat />' . "\n" .
		'      <Protection />' . "\n" .
		'    </Style>' . "\n" .
		'    <Style ss:ID="s21">' . "\n" .
		'      <Font x:Family="Arial" ss:Bold="1" />' . "\n" .
		'    </Style>' . "\n" .
		'  </Styles>' . "\n"
		;
		return $header;
	}
	
	function tableHeader(){
		return '  <Table ss:ExpandedColumnCount="2" ss:ExpandedRowCount="5" x:FullColumns="1" x:FullRows="1">'."\n";
	}
	
	function worksheetHeader($name){
		return '  <Worksheet ss:Name="'. $name . '">' ."\n";		
	}

	function worksheetFooter(){
		return '  </Worksheet>' ."\n";		
	}
	
	function rowHeader(){
		return "      <Row>\n";
	}

	function rowFooter(){
		return "      </Row>\n";
	}

	function cell($data, $bold=false, $type = null){
		if ($type == null){
			if (is_numeric($data)){
				if ($bold == true)	return '        <Cell ss:StyleID="s21"><Data ss:Type="Number">'.$data."</Data></Cell>\n";
				else				return '        <Cell><Data ss:Type="Number">'.$data."</Data></Cell>\n";
			} else {
				if ($bold == true)	return '        <Cell ss:StyleID="s21"><Data ss:Type="String">'.$data."</Data></Cell>\n";
				else				return '        <Cell><Data ss:Type="String">'.$data."</Data></Cell>\n";
			}
		} else {
			if ($bold == true)		return '        <Cell ss:StyleID="s21"><Data ss:Type="'.$type.'">'.$data."</Data></Cell>\n";
			else					return '        <Cell><Data ss:Type="'.$type.'">'.$data."</Data></Cell>\n";
		}
	}


	function worksheetOptions(){
		$result =
		'    <WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">'. "\n".
		'      <Print>'. "\n".
		'        <ValidPrinterInfo />'. "\n".
		'        <HorizontalResolution>600</HorizontalResolution>'. "\n".
		'        <VerticalResolution>600</VerticalResolution>'. "\n".
		'      </Print>'. "\n".
		'      <Selected />'. "\n".
		'      <Panes>'. "\n".
		'        <Pane>'. "\n".
		'          <Number>3</Number>'. "\n".
		'          <ActiveRow>5</ActiveRow>'. "\n".
		'          <ActiveCol>1</ActiveCol>'. "\n".
		'        </Pane>'. "\n".
		'      </Panes>'. "\n".
		'      <ProtectObjects>False</ProtectObjects>'. "\n".
		'      <ProtectScenarios>False</ProtectScenarios>'. "\n".
		'    </WorksheetOptions>'. "\n"
		;
		return $result;
	}

	function tableFooter(){
		return "  </Table>\n";		
	}
	
	function footer()
	{
		return "</Workbook>\n"; 
	}
}
?>