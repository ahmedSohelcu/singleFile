0.Laravel Sending notificatin with mail,artisan,cronjob etc
===============================================================
--------------------------------------
1. .env file setting for sendign mail
--------------------------------------
1.setting for mail trip. 

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=0a5d5bc2b51cc8
MAIL_PASSWORD=ed4767c5856336
MAIL_ENCRYPTION=tls

OR 

2.setting for direct mail address usign 2 step varified gamil

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=ahmedsohelcu@gmail.com
MAIL_PASSWORD=dzrdvnqwhppzcfyd
MAIL_ENCRYPTION=tls

N:b: here password is generated app key
--------------------------------------


--------------------------------------
php artisan make:command EmailDocumentValidy
2. app\console\Commands\EmailDocumentValidy.php 
--------------------------------------
<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\User;
use App\DocumentValidator;
use App\Notifications\ReminderNotification;

class EmailDocumentValidy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:document-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email to user about their document to remember Expire date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */


//-----------------------------------------------------------------------

    //sent notification to user  according to reminder date  and send
    public function handle(){

        $getAllReminderDataByDate =  DocumentValidator::where('reminderDate', date('y-m-d') )->get();

        foreach ($getAllReminderDataByDate as $reminderData){
            echo $user_id =  $reminderData->user_id;

            $getAllUserData = User::where('id',  $user_id)->get();

            foreach ($getAllUserData as $userData){
                $userData->notify(new ReminderNotification($userData, $reminderData) );
                $this->info('Email sent to '.$userData->name);
            }
        }
    }


//-----------------------------------------------------------------------


//-----------------------------------------------------------------------
 //sent notification to user  with his whole riminder data
//    public function handle()
//    {
//       $users = User::all();
//       foreach ($users as $user){
//           $user->notify(new ReminderNotification($user) );
//           $this->info('Email sent to '.$user->name);
//       }
//
//    }
//-----------------------------------------------------------------------

}


--------------------------------------
php artisan make:notificatin ReminderNotification
2. app\notificatin\ReminderNotification
--------------------------------------
<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\DocumentValidator;

class ReminderNotification extends Notification
{
    use Queueable;

    public $userData;
    public $reminderData;

    //public $userInfo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userData, $reminderData){

        //get all user
        $this->userData = $userData;

        //get reminder data
        $this->reminderData = $reminderData;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting("Hello ".$this->userData->name.', ')
            ->line('You have a notification Title '.$this->reminderData->documentTitle)
            ->line('Expire date is '.$this->reminderData->reminderDate)
            ->action('visit website', url('/dvalidator'))
            ->line('Thank you for using Notification validator !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}



--------------------------------------
php artisan make:notificatin ReminderNotification
3. app\console\Kernel.php
--------------------------------------

<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // register our command
        //EmailDocumentValidy::class or
        'App\Console\Commands\EmailDocumentValidy'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //Developed by Ahmed ullah
        // $schedule->command('email:document-reminder')->everyMinute();

        // ->twiceDaily(1, 13); //Run the task daily at 1:00 & 13:00
        // ->dailyAt('13:00');	Run the task every day at 13:00
        // ->daily(); Run the task every day at midnight

         $schedule->command('email:document-reminder')
            ->daily();

         //to run this command write  php artisan schedule:run  on powershell
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

