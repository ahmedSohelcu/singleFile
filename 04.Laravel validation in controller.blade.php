======================================================================================
//store //validate unique value
======================================================================================
$request->validate([
    'name'        => 'required|unique:tableName',
    'description' => 'nullable|string',
]);



======================================================================================
//update validate unique value for update
======================================================================================
$request->validate([
    'name'        => 'required|unique:tableName,fieldName,'.$id,
    'description' => 'nullable|string',
]);