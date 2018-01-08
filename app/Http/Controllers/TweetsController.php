<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Twitter;
use Twitter;
use App\tweets;

class TweetsController extends Controller
{

    /**
     * @param Request $request
     * Count falloweres of user that retweted tweet.
     */
    public function search(Request $request)
    {
        $request->validate([
            'tweet' => 'required|max:255',
        ]);
        $countFollowers = 0;
        $tweet = new tweets();
        //Check if exist and if it is not older then two hours update
        $tweetObj = $tweet->where('tweetUrl', $request->tweet)->where('created_at', '>=', time() - (2 * 60 * 60))->where('updated_at', '>=', time() - (2 * 60 * 60))->first();
        if ($tweetObj != null) {
            $countFollowers = $tweetObj->sumFollowers;
        } else {
            $tweetArr = explode("/", $request->tweet);
            $tweetID = (end($tweetArr));
            $parametars = array(
                'id' => $tweetID
            );
            $users = Twitter::getRters($parametars);
            foreach ($users->ids as $userId) {
                $parametars = array(
                    'id' => $userId
                );
                $folowers = Twitter::getFollowersIds($parametars);
                $countFollowers += count($folowers->ids);
            };
            //check if exist in database and update or Create new one row
            $tweetObj = $tweet->where('tweetUrl', $request->tweet)->first();
            if ($tweetObj != null) {
                $tweet->sumFollowers = $countFollowers;
                $tweet->save();
            } else {
                $tweet->tweetUrl = $request->tweet;
                $tweet->sumFollowers = $countFollowers;
                $tweet->save();
            }
        }
        $data['countFollowers'] = $countFollowers;
        return view('pages.result', $data);

    }
}
