	//store
	$request->validate([
            'name'        => 'required|unique:nationalities',
            'description' => 'nullable|string',
        ]);


	//update
	$request->validate([
            'name'        => 'required|unique:nationalities,name,'.$id,
            'description' => 'nullable|string',
        ]);