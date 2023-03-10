<?php

use danog\MadelineProto\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('/hello', function (){
//    if (!file_exists('madeline.php')) {
//        copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
//    }

    $MadelineProto = new \danog\MadelineProto\API('session.madeline');
    $MadelineProto->async(false);
    $MadelineProto->start();
    $me = $MadelineProto->getSelf();
    dd($MadelineProto->getSelf());
//    $MadelineProto->logger($me);
//
//    if (!$me['bot']) {
//        $MadelineProto->messages->sendMessage(peer: '@stickeroptimizerbot', message: "/start");
//
//        $MadelineProto->channels->joinChannel(channel: '@MadelineProto');
//
//        try {
//            $MadelineProto->messages->importChatInvite(hash: 'https://t.me/+Por5orOjwgccnt2w');
//        } catch (\danog\MadelineProto\RPCErrorException $e) {
//            $MadelineProto->logger($e);
//        }
//    }
//    $MadelineProto->echo('OK, done!');
});

Route::get('/send-message-1', function (){
    $MadelineProto = new \danog\MadelineProto\API('session.madeline');
    $MadelineProto->async(false);
    $MadelineProto->start();

    dd($MadelineProto->messages->sendMessage(['peer' =>'https://t.me/PavloSachenko', 'message' => 'hello from laravel app (user account)']));
});

Route::get('/send-message-2', function (){
    $MadelineProto = new \danog\MadelineProto\API('session.madeline');
    $MadelineProto->async(false);
    $MadelineProto->start();

    dd($MadelineProto->messages->sendMessage(['peer' =>'https://t.me/adieush', 'message' => 'hello from laravel app (user account)']));
});

Route::any('/new-message', function (){

    \App\MyEventHandler::startAndLoop('session.madeline', new Settings());
});

Route::post('/msg', function (Request $request){
    $MadelineProto = new \danog\MadelineProto\API('session.madeline');
    $MadelineProto->async(false);
    $MadelineProto->start();
    dump($request->name);
    dump($request->messaage);
    dd($MadelineProto->messages->sendMessage(['peer' =>'https://t.me/' . $request->name, 'message' => $request->messaage]));
});

