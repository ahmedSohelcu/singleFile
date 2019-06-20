=================================================================
this css will only work for print page
=================================================================
 @media print{
	table.salaryReport thead th {
		border-bottom: 1px solid #dee2e6;
		font-size: 3px!important;
		color: #000!important;
		padding: 2px 2px!important;
	}
	
	table.salaryReport{
		/*display: none;*/
	}
	
	/*for page break by Ahmed in the print page*/
	.page_break {
		page-break-after: always;
	}
}
	
	
=================================================================
this css will only work for scree not print page
=================================================================
		
  @media screen{
	.table tbody td {
		vertical-align: bottom;
		border-bottom: 2px solid #dee2e6;
		font-size: 11px!important;
		padding: 9px 9px!important;
		background: #f8f8f8!important;
	}
}
 