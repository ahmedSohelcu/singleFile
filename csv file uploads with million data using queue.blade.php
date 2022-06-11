
============================
//install queue
============================
1.php artisan queue:table
2.pah artisan migrate
3.//add in .env file
QUEUE_CONNECTION=database 

======================
Creating Jobs
======================
php artisan queue:work


create job and add script for
doing queue background task
===============-============
php artisan make:job PrductPodcast


============================
dispatch job from controller
===============-============
ProcessPodcast::dispatch();



============================
and finally runt the queue
for background task running
===============-============
php artisan queue:work

//=========================================
//example
//=========================================

		---------------------------------------------------
					01. form
		---------------------------------------------------
 <form action="{{url('upload_csv_records')}}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
<input type="file" name="csv_file">
<hr>
<input type="submit" value="upload file">
</form>

		---------------------------------------------------
				02.controller method 
		---------------------------------------------------
//==========================================================================
// Start csv file upload with queue
//==========================================================================

//------------------------------------------------------------
//01. file upload and create in resource/temp  with chunk
//------------------------------------------------------------
Route::post('/upload_csv_records',function (){
    if( request()->has('csv_file') ) {
        $data    = file(request()->csv_file);

        //chunking file...
        $chunks = array_chunk($data,4);

//        $batch  = Bus::batch([])->dispatch();
        foreach ($chunks as $key => $chunk) {
            $file_name = "/tmp-{$key}.csv";
            $path = resource_path('temp');

            //convert 2 records into a new csv file..
            file_put_contents($path.$file_name, $chunk);
        }
        dd('new csv files created in resource / temp folder ');
    }
    return "please upload csv file";
});


//------------------------------------------------------------
//02. file upload from resource/temp one by one using queue
//------------------------------------------------------------
Route::get('/store_file',function (){
   $path = resource_path('temp');
   $files = glob("$path/*.csv");

   $header = [];
   foreach ($files as $key => $file){
       $data = array_map('str_getcsv', file($file));

       //only for first file
       if ($key === 0){
           $header = $data[0]; //array of only column name list
           unset($data[0]); //array of all data except column list
       }

       \App\Jobs\PoductCsvProcess::dispatch($data,$header);
       unlink($file);
   }

    return 'File uploaded done..';
});

//==========================================================================
// End csv file upload with queue
//==========================================================================



-----------------------------------------------------------------------------
Job file //php artisan make:job PoductCsvProcess
-----------------------------------------------------------------------------
<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PoductCsvProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public $header;

    public function __construct($data, $header)
    {
        $this->data = $data;
        $this->header = $header;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->data as $product){
            $product_data = array_combine($this->header,$product);
            \App\Models\Product::query()->create($product_data);
        }
    }
}


//--------------------------------
//example of csv file format
//---------------------------------
name,price
product 1,50.00
product 2,50.00
product 3,50.00
product 4,50.00
product 5,50.00
product 6,50.00 
