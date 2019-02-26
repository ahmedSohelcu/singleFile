 public function rules()
    {
        return [
            'name'      => 'required', //this field is validated from controller .....
            'unit_id' => 'integer',
            'description' => 'nullable|string'
        ];
    }


    public function messages()
    {
        return [
            'unit_id.required' => 'Please select the unit first first',
            'unit_id.integer' => 'Please select the unit first'
        ];
    }