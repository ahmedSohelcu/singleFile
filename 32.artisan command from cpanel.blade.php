
====================================================================
1.calling artinsan  command from cpanel
-------------------------------------------------------------------
Route::get('/updateapp', function()
{
    \Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});


Route::get('/clear-cache', function() {
    $output = new \Symfony\Component\Console\Output\BufferedOutput;
    \Artisan::call('cache:clear', $output);
    dd($output->fetch());
});


Route::get('optimize',function(){
	Artisan::call('key:generate');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return redirect('/');
});



Route::get('migrate',function(){
    Artisan::call('migrate');
    return redirect('/');
});