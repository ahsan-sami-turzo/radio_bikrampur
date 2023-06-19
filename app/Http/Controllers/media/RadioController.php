<?php

namespace App\Http\Controllers\media;

use View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Service\StreamHelper;
use App\Service\YoutubeLiveStreamingService;


class RadioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function index()
    {

      $streamHelper = new StreamHelper();

      $channel_id = $streamHelper->get_channel_Id(); // youtube-channel
      $api_key = $streamHelper->get_api_key(); // google developer api credential

      $youTubeLive = new YoutubeLiveStreamingService($channel_id, $api_key);

      $isLiveNow = $youTubeLive->isLive;
      $streamInfo = $youTubeLive->embed_code;
        
      // dd($youTubeLive);

      return view('security/media/radio',compact('youTubeLive'));
  }


  public function save_youtube_url($request){

    DB::beginTransaction();
    try{
      DB::table('youtube_url')->insert( array (
        'url' => $request->url
      ));
      DB::commit();
    }
    catch(\Exception $exception){
        DB::rollback();
        $data = array(
            'responseTitle'  =>  'Warning!',
            'responseText'   => $exception->getMessage()
        );
        return response()->json($data);
    }
      
  }

  public function fetch_last_video(){
    $video = DB::table('youtube_url')->latest('created_on')->first(); 
    return $video;
  }


}


/*


<div id="player">
                @if($youTubeLive->isLive)
                    <?php  echo $youTubeLive->embed_code; ?>
                @else
                    <h3>Not live now. Please check back later.</h3>
                @endif
            </div>


            */