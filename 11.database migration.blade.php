//Modify Existing Table with migration
==========================================================

1.To Change Existing table's field type
-----------------------------------------------------------
$table->date('expire')->change(); //it will change the current data type field to date format. think current type was string

	To install doctrine/dbal for modify field
	composer require doctrine/dbal
	

2.Add new field to an Existing table
-----------------------------------------------------------
a. $table->unsignedInteger('section_id')->after('name')->nullable();
		
		b.down()
		------------------------------------
		$table->dropColumn(['section_id]);
		
		

3.Rename Existing table's field name		
-----------------------------------------------------------
	up() function 
	-------------------------------------
	$table->renameColumn('phone','number');

	
	down() function 
	-------------------------------------
	$table->renameColumn(['number','phone']); //previous name 