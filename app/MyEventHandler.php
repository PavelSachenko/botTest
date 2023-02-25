<?php
namespace App;
use danog\MadelineProto\EventHandler;

class MyEventHandler extends EventHandler
{
    const ADMIN = 'PavloProto';

    /**
     * Get peer(s) where to report errors
     *
     * @return int|string|array
     */
    public function getReportPeers()
    {
        return [self::ADMIN];
    }

    /**
     * Handle updates from users.
     *
     * @param array $update Update
     *
     * @return \Generator
     */
    public function onUpdateNewMessage(array $update): \Generator
    {
        if ($update['message']['_'] === 'messageEmpty' || $update['message']['out'] ?? false) {
            yield [];
        }
        $res = \json_encode($update, JSON_PRETTY_PRINT);
        \Illuminate\Support\Facades\Log::debug("---------------------------".date('Y-m-d H:i:s')."-----------------------------");
        \Illuminate\Support\Facades\Log::debug($res);
        \Illuminate\Support\Facades\Log::debug("----------------------------------------------------------------------");
//        yield $this->messages->sendMessage(['peer' => $update, 'message' => "This userbot is powered by MadelineProto!", 'reply_to_msg_id' => isset($update['message']['id']) ? $update['message']['id'] : null, 'parse_mode' => 'HTML']);
//        if (isset($update['message']['media']) && $update['message']['media']['_'] !== 'messageMediaGame') {
//            yield $this->messages->sendMedia(['peer' => $update, 'message' => $update['message']['message'], 'media' => $update]);
//        }

//        // You can also use the built-in MadelineProto MySQL async driver!
//
//        // Can be anything serializable, an array, an int, an object
//        $myData = [];
//
//        // Use the isset method to check whether some data exists in the database
//        if (yield $this->dataStoredOnDb->isset('yourKey')) {
//            // Always yield when fetching data
//            $myData = yield $this->dataStoredOnDb['yourKey'];
//        }
//        $this->dataStoredOnDb['yourKey'] = $myData + ['moreStuff' => 'yay'];
//
//        $this->dataStoredOnDb['otherKey'] = 0;
//        unset($this->dataStoredOnDb['otherKey']);
//
//        $this->logger("Count: ".(yield $this->dataStoredOnDb->count()));
//
//        // You can even use an async iterator to iterate over the data
//        $iterator = $this->dataStoredOnDb->getIterator();
//        while (yield $iterator->advance()) {
//            [$key, $value] = $iterator->getCurrent();
//            $this->logger($key);
//            $this->logger($value);
//        }
        yield [];
    }
}
