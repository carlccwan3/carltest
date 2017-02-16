<?php $__env->startSection('content'); ?>
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
                    <canvas id="myCanvas" width="200" height="100" style="z-index: 999;top: -100px;position: relative;background: rgba(255, 255, 255, 0.6)"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="//nos.netease.com/vod163/nep.min.js"></script>
    <script>
      var myPlayer = neplayer("my-video");
      myPlayer.setDataSource({
        type: "rtmp/flv",
        src: "rtmp://v1f40a35d.live.126.net/live/8d17f5a4fac041629029e291673068fb"
      });

      var ctx = document.getElementById('myCanvas').getContext('2d');
      ctx.shadowOffsetX = 5;
      ctx.shadowOffsetY = 2;
      ctx.shadowBlur = 2;

      ctx.font = '20px Times New Roman';
      ctx.fillStyle = 'Black';
      ctx.fillText('Sample String', 0, 30);
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>