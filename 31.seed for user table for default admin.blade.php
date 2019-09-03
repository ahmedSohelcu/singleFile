store data with laravel and bootstrap modal
====================================================================
1.seed for user table 
-------------------------------------------------------------------
       public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            \App\User::query()->create([
                'name' =>'admin',
                'email' =>'admin@gmail.com',
                'password' =>bcrypt('123456'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);

        });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }