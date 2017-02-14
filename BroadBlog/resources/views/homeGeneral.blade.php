@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Online Broadcast System</div>

                <div class="panel-body">
                        <button id="displayStream">Watching</button>
                </div>
                <div class="panel-body">
                    <video id="my-video" class="video-js" x-webkit-airplay="allow" webkit-playsinline controls poster="poster.png" preload="auto" width="640" height="360" data-setup="{}">
                        <source src="RTMP-FLV.flv" type="rtmp/flv">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="//nos.netease.com/vod163/nep.min.js"></script>
    <script>
      var myPlayer = neplayer("my-video");
      myPlayer.setDataSource({
        type: "rtmp/flv",
        src: "rtmp://v1f40a35d.live.126.net/live/8d17f5a4fac041629029e291673068fb"
      });
    </script>
@endsection


