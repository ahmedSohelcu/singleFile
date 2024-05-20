
====================================================
Activate realtime messaging 
(Like someone is typing, loged in etc)
====================================================
Step for pusher...
---------------------------

-------------------------------------------------------------------
Follow the rule of Laravel Broadcasting from laravel documentation
-------------------------------------------------------------------
1.install pusher 
composer require pusher/pusher-php-server "~4.0"


-------------------------------------------------------------------
2.Add this code in config/broadcasting.php
-------------------------------------------------------------------
'options' => [
    'cluster' => 'eu',
    'useTLS' => true
],


-------------------------------------------------------------------
3.Add this code in resources/js/bootstrap.js 
-------------------------------------------------------------------
import Echo from "laravel-echo";

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'your-pusher-channels-key'
});

-------------------------------------------------------------------
4.Finally, you will need to change your broadcast driver to pusher in your .env file:
-------------------------------------------------------------------
BROADCAST_DRIVER=pusher


-------------------------------------------------------------------
5.add credential from pusher.com (from your app) in .env file...
-------------------------------------------------------------------
//this setting is from my featurebangla project app [change accordign to your app credential]
PUSHER_APP_ID=1013551
PUSHER_APP_KEY=dc49a011680021a1b507
PUSHER_APP_SECRET=bc66355006268fd4c4f6
PUSHER_APP_CLUSTER=ap2

-------------------------------------------------------------------
6.create an event according to our need (with implements ShouldBroadcast)
-------------------------------------------------------------------
php artisan make:event OurEventName ..
6.1: follow the #'Defining Broadcast Events' from laravel documentation..


-------------------------------------------------------------------
7. Broadcasting Events /listening an event
//Follow 'Broadcasting Events' from laravel documentation..
-------------------------------------------------------------------
//testing..
Route::get('/', function (){
    event(new OurEventName('This is new message.'));
});


-------------------------------------------------------------------
8.BroadcastServiceProvider
-------------------------------------------------------------------
Uncomment BroadcastServiceProvider from config/app.php file....


			Listening broadcast with channel


-------------------------------------------------------------------
9.Receiving Broadcasts //Installing Laravel Echo
(follow From laravel documentation)
-------------------------------------------------------------------
9.1: npm install --save laravel-echo pusher-js


-------------------------------------------------------------------
10.resources/js/bootstrap.js file
-------------------------------------------------------------------
uncomment and change the app resources/js/bootstrap.js file
Like:


import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: "dc49a011680021a1b507",
    cluster: "ap2",
    forceTLS: true
});

-------------------------------------------------------------------
11.Listening an events with channel //from where we want to listen 
like app.js or other...
-------------------------------------------------------------------
Echo.private('mychenelName')
    .listen('myEventName', (e) => {
        console.log(e);
    });

//channel like private /public/presence

-------------------------------------------------------------------
12.Create channel route in route/channels.php file...
-------------------------------------------------------------------
Example :
-----------------
Broadcast::channel('mychenelName', function () {
    return true;
});

Example :
-----------------
Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

-------------------------------------------------------------------
Restart server / xampp  after change in env file.....
-------------------------------------------------------------------
        


