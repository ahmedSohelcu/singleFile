
//--------------------------------
Job Batching
//--------------------------------
job batch is for tracking job current
 status/progress

php artisan queue:batches-table
use Batchable traits in our job


============================
dispatch job from controller
===============-============
ProcessPodcast::dispatch();



============================
and finally runt the queue
for background task running
===============-============
php artisan queue:work


==========================================
Documentation:
==========================================
1.Laravel queue
2.Creating Jobs
2.Dispatching Jobs  -- to assign job
3.Job Batching --- for knowing uploaded file current status
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
// Start csv file upload with queue and pregress status
//==========================================================================

//------------------------------------------------------------
//01. file upload and create in resource/temp  with chunk
//------------------------------------------------------------
//way 2 without splitting file
//-----------------------------
//==========================================================================
// Start csv file upload with queue
//==========================================================================
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Bus;

//01. file upload and create in resource/temp  with chunk
Route::post('/upload_csv_records',function (){
    if( request()->has('csv_file') ) {
        $data  = file(request()->csv_file);
        $chunks = array_chunk($data,200);

        $header = [];
        $batch = \Illuminate\Support\Facades\Bus::batch([])->dispatch();
        foreach ($chunks as $key => $chunk) {
            $data = array_map('str_getcsv', $chunk);

            if ($key === 0){
                $header = $data[0]; //array of only column name list
                unset($data[0]); //array of all data except column list
            }

            $batch->add(new \App\Jobs\PoductCsvProcess($data, $header));
        }
        return $batch; //will return batch object with batch_id
    }
    return "please upload csv file";
});

//-----------------------------------------------------------------------------
//get batch info //to know uploaded file status
//-----------------------------------------------------------------------------
Route::get('/batch/{batchId}', function (string $batchId) {
    return Bus::findBatch($batchId);
});
//==========================================================================
// End csv file upload with queue
//==========================================================================



-----------------------------------------------------------------------------
Job file //php artisan make:job PoductCsvProcess // use Batchable traits 
-----------------------------------------------------------------------------
<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PoductCsvProcess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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

//-=============================
//run 
//-=============================
php artisan queue:work 
//and then upload file 

//-=============================

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
