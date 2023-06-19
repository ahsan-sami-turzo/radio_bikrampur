<?php
namespace app\Service;

class StreamHelper {
  
    private $channelId = 'UCn-j9hhUoE2eOOappL7wRWg'; // youtube-channel
    private $api_key = 'AIzaSyDlBDSGPEMYEok89N9z37QewfPE0OkraP0'; // google developer api credential

    public function get_channel_Id() {
        return $this->channelId;
    }

    public function get_api_key() {
        return $this->api_key;
    }
}

?> 