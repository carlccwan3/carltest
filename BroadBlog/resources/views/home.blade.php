@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Online Testing System</div>

                    <div class="panel-body">
                        <div class="col-md-6 col-lg-6" style="padding-left:0px;">
                            <button id="displayStream">Start Webcast</button>
                            <button id="stopStream" style="display: none">Stop Webcast</button>
                        </div>
                        <div class="col-md-6 col-lg-6" style="padding-right:0px;">
                            <p style="text-align: right" id="previewing">Please allow camera and microphone access!</p>
                            <p style="text-align: right; display: none; color:blue" id="broadcasting">Your are in Webcasting status now</p>
                        </div>

                    </div>
                    <div class="panel-body">
                        <div id="my-publisher"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript" src="//nos.netease.com/vod163/nePublisher.min.js"></script>
@section('scripts')
    <script>
      var myPublisher = new nePublisher(
        'my-publisher', // String 必选 推流器容器id
        {   // Object 可选 推流初始化videoOptions参数
          videoWidth : 720,    // Number 可选 视频宽度 default 640
          videoHeight: 480,   // Number 可选 视频高度 default 480
          fps        : 15,            // Number 可选 帧率 default 15
          bitrate    : 600,       // Number 可选 码率 default 600
          video      : true,       // Boolean 可选 是否推流视频 default true
          audio      : true       // Boolean 可选 是否推流音频 default true
        }, { // Object 可选 推流初始化flashOptions参数
          previewWindowWidth : 720,    // Number 可选 推流器宽度 default 862
          previewWindowHeight: 480,   // Number 可选 推流器高度 default 446
          wmode              : 'transparent',       // String 可选 flash显示模式 default transparent
          quality            : 'high',            // String 可选 flash质量 default high
          allowScriptAccess  : 'always' // String 可选 flash跨域允许 default always
        }, function () {
                  /*
                   function 可选 初始化成功的回调函数
                   可在该回调中调用getCameraList和getMicroPhoneList方法获取 摄像头和麦克风列表
                   cameraList = this.getCameraList();
                   microPhoneList = this.getMicroPhoneList();
                   */
          myPublisher.startPreview(0);

        });

      $("#displayStream").click(function () {
        // @参数 cameraIndex {Number} 必选 从getCameraList函数获取的摄像头列表中选择要预览的摄像头的索引
        myPublisher.startPublish(
          'rtmp://p1f40a35d.live.126.net/live/8d17f5a4fac041629029e291673068fb?wsSecret=469c5d44b38fa452c005b6a17c1ce4d5&wsTime=1486974859', // String 必选 要推流的频道地址
          { // Object 可选 推流参数
            videoWidth : 720,    // Number 可选 推流视频宽度 default 640
            videoHeight: 480,   // Number 可选 推流视频高度 default 480
            fps        : 15,            // Number 可选 推流帧率 default 15
            bitrate    : 600,       // Number 可选 推流码率 default 600
            video      : true,       // Boolean 可选 是否推流视频 default true
            audio      : true       // Boolean 可选 是否推流音频 default true
          });

        $("#displayStream").hide();		
        $("#stopStream").show();

        $("#previewing").hide();
        $("#broadcasting").show();

      });

      $("#stopStream").click(function () {
        myPublisher.stopPublish();
        window.location.href = '/home';
      });
    </script>
@endsection


