<?php

     /*
      * This Helper bases on the ExcelWriter class 
      * from Harish Chauhan.
      * 
     ###############################################
     ####                                       ####
     ####    Author : Harish Chauhan            ####
     ####    Date   : 31 Dec,2004               ####
     ####    Updated:                           ####
     ####                                       ####
     ###############################################
     
	 * Class is used for save the data into microsoft excel format.
	 * It takes data into array or you can write data column vise.

     */


class ExcelHelper extends Helper {
	var $helpers = array('Html');
	
	
	public function header($author=null, $company=null)
	{
		if ($author == null) $author="";
		if ($company== null) $company = "";
		$header = 
			'<?xml version="1.0"?>' ."\n" .
			'<?mso-application progid="Excel.Sheet"?>' ."\n" .
			'<Workbook' ."\n" .
   			'xmlns="urn:schemas-microsoft-com:office:spreadsheet"'."\n" .
   			'xmlns:o="urn:schemas-microsoft-com:office:office"'."\n" .
   			'xmlns:x="urn:schemas-microsoft-com:office:excel"'."\n" .
   			'xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"'."\n" .
   			'xmlns:html="http://www.w3.org/TR/REC-html40">'."\n" .
   			'<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">'."\n" .
    		'   <Author>'.$author.'</Author>'."\n" .
    		'   <LastAuthor>'.$author.'</LastAuthor>'."\n" .
    		'   <Created>2007-03-15T23:04:04Z</Created>'."\n" .
    		'   <Company>'.$company.'</Company>'."\n" .
    		'   <Version>11.8036</Version>'."\n" .
  			'</DocumentProperties>'."\n" .
   			'<ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">'."\n" .
    		'   <WindowHeight>6795</WindowHeight>'."\n" .
    		'   <WindowWidth>8460</WindowWidth>'."\n" .
    		'   <WindowTopX>120</WindowTopX>'."\n" .
    		'   <WindowTopY>15</WindowTopY>'."\n" .
    		'   <ProtectStructure>False</ProtectStructure>'."\n" .
    		'   <ProtectWindows>False</ProtectWindows>'."\n" .
  			'</ExcelWorkbook>'."\n" .
  		    '<Styles>'."\n" .
  		    '   <Style ss:ID="Default" ss:Name="Normal">'."\n" .
  		    '      <Alignment ss:Vertical="Bottom" />'."\n" .
  		    '      <Borders />'."\n" .
  		    '      <Font />'."\n" .
  		    '      <Interior />'."\n" .
  		    '      <NumberFormat />'."\n" .
  		    '      <Protection />'."\n" .
  		    '   </Style>'."\n" .
  		    '   <Style ss:ID="s21">'."\n" .
  		    '      <Font x:Family="Swiss" ss:Bold="1" />'."\n" .
  		    '   </Style>'."\n" .
  		    '</Styles>'."\n";
  			
		return $header;
	}
	
	function tableHeader(){
		return '<Table ss:ExpandedColumnCount="2" ss:ExpandedRowCount="5" x:FullColumns="1" x:FullRows="1">'."\n";
	}
	
	function worksheetHeader($name){
		return '<Worksheet ss:Name="'. $name . '">' ."\n";		
	}

	function worksheetFooter(){
		return '</Worksheet>' ."\n";		
	}
	
	function rowHeader(){
		return '<Row>';
	}

	function rowFooter(){
		return '</Row>'."\n";
	}

	function cellHeader(){
		return '<Cell>';
	}

	function cellFooter(){
		return '</Cell>';
	}
	function cellData($data){
		if (is_numeric($data)){
			return '<Cell ss:Type="Number">'.$data.'</Cell>';
		} else {
			return '<Cell ss:Type="String">'.$data.'</Cell>';
		}
	}


	function tableFooter(){
		return '</Table>' ."\n";		
	}
	
	function footer()
	{
		return $this->Html->tag('ss:Workbook'); 
	}
	
	function tableCells($data) {
		$result = "";
		foreach ($data as $line) {
			$result .= $this->Html->tag('tr');
			
			foreach ($line as $elem) {
				$result .= $this->Html->tag('td class=xl24 width=64');
				$result .= $elem; 
				$result .= $this->Html->tag('/td'); 
			}
			
			$result .= $this->Html->tag('/tr');
			$result .= "\n"; 
		}
		return $result;
	}
}
?>