@extends('admin.Header')

@section('style')
    @parent
    <style>
        .dash-panel {width: 90%; height: 90%;}
        .panel-body {height: 40%}
        /*.footer-btn {float:right}*/
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-1 col-sm-2 col-md-2"></div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="panel panel-primary dash-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sentiment distribution</h3>
                    </div>
                    <div class="panel-body">
                        <canvas id="radar">
                        </canvas>
                    </div>

                </div>

            </div>

            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="panel panel-primary dash-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Regression</h3>
                    </div>
                    <div class="panel-body">
                        <div >
                        <?php
                            $result = json_decode($result,true);
                                $tmp = "storage/temp_reg";
                                $tmp = $tmp.$result[0]["question_id"];
                                $tmp = $tmp."_";
                                $answer = ["case_study_answer","section_question_answer","survey_answer"];
                                $type = $result[0]["type_id"];
                                $tmp = $tmp.$answer[$type-1].".png";
                            $source = asset($tmp);
                            echo "<img style=\"width: 100%; height: 50%\" src=$source >";
                        ?>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-xs-1 col-sm-2 col-md    -2"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-1 col-sm-2 col-md-2"></div>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="panel panel-primary dash-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">LDA Model</h3>
                    </div>
                    <div class="panel-body">
                        <p><?php

                            echo $result[0]["lda"];
                            ?></p>

                    </div>

                </div>

            </div>

            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="panel panel-primary dash-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Co-occurrence</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            <?php
                            echo $result[0]["co_occur"];
                            ?>
                        </p>

                    </div>

                </div>

            </div>
            <div class="col-xs-1 col-sm-2 col-md-2"></div>
        </div>
    </div>


<?php


$tmp4= url("/dataanalysis");
echo "<div class=\"text-center\"><a href = $tmp4  class=\"btn btn-primary\" role=\"button\">Return</a></div>"

?>
@endsection

@section('script')
    @parent
    <script type="text/javascript">

        var sent_data = '{{ $result[0]["sentiment"] }}';
        sent_data = sent_data.replace('[','').replace(']','');
        sent_data = sent_data.split(', ');

        var sent_name = ['anger', 'fear', 'anticipation', 'trust', 'surprise', 'sadness', 'joy', 'disgust'];
        var tmp_sent = [];
        for(i=0;i<8;i++){
            tmp_sent.push([sent_name[i],parseFloat(sent_data[i]) * 300]);
        }
        var mW = 300;
        var mH = 300;
        var mData = tmp_sent;
        var mCount = mData.length; //number of sides
        var mCenter = mW /2; //center point
        var mRadius = mCenter - 50; //radius
        var mAngle = Math.PI * 2 / mCount; //angle
        var mCtx = null;
        var mColorPolygon = '#B8B8B8'; //color of polygon
        var mColorLines = '#B8B8B8'; //color of lines for connections
        var mColorText = '#000000';

        //Cited from https://blog.csdn.net/lecepin/article/details/60466711
        //Initialize
        (function(){
            var canvas = document.getElementById('radar');
            canvas.height = mH;
            canvas.width = mW;
            mCtx = canvas.getContext('2d');

            drawPolygon(mCtx);
            drawLines(mCtx);
            drawText(mCtx);
            drawRegion(mCtx);
            drawCircle(mCtx);
        })();


        function drawPolygon(ctx){
            ctx.save();

            ctx.strokeStyle = mColorPolygon;
            var r = mRadius/ mCount;

            for(var i = 0; i < mCount; i ++){
                ctx.beginPath();
                var currR = r * ( i + 1);

                for(var j = 0; j < mCount; j ++){
                    var x = mCenter + currR * Math.cos(mAngle * j);
                    var y = mCenter + currR * Math.sin(mAngle * j);

                    ctx.lineTo(x, y);
                }
                ctx.closePath()
                ctx.stroke();
            }

            ctx.restore();
        }


        function drawLines(ctx){
            ctx.save();

            ctx.beginPath();
            ctx.strokeStyle = mColorLines;

            for(var i = 0; i < mCount; i ++){
                var x = mCenter + mRadius * Math.cos(mAngle * i);
                var y = mCenter + mRadius * Math.sin(mAngle * i);

                ctx.moveTo(mCenter, mCenter);
                ctx.lineTo(x, y);
            }

            ctx.stroke();

            ctx.restore();
        }


        function drawText(ctx){
            ctx.save();

            var fontSize = mCenter / 12;
            ctx.font = fontSize + 'px Microsoft Yahei';
            ctx.fillStyle = mColorText;

            for(var i = 0; i < mCount; i ++){
                var x = mCenter + mRadius * Math.cos(mAngle * i);
                var y = mCenter + mRadius * Math.sin(mAngle * i);

                if( mAngle * i >= 0 && mAngle * i <= Math.PI / 2 ){
                    ctx.fillText(mData[i][0], x, y + fontSize);
                }else if(mAngle * i > Math.PI / 2 && mAngle * i <= Math.PI){
                    ctx.fillText(mData[i][0], x - ctx.measureText(mData[i][0]).width, y + fontSize);
                }else if(mAngle * i > Math.PI && mAngle * i <= Math.PI * 3 / 2){
                    ctx.fillText(mData[i][0], x - ctx.measureText(mData[i][0]).width, y);
                }else{
                    ctx.fillText(mData[i][0], x, y);
                }

            }

            ctx.restore();
        }


        function drawRegion(ctx){
            ctx.save();

            ctx.beginPath();
            for(var i = 0; i < mCount; i ++){
                var x = mCenter + mRadius * Math.cos(mAngle * i) * mData[i][1] / 100;
                var y = mCenter + mRadius * Math.sin(mAngle * i) * mData[i][1] / 100;

                ctx.lineTo(x, y);
            }
            ctx.closePath();
            ctx.fillStyle = 'rgba(255, 0, 0, 0.5)';
            ctx.fill();

            ctx.restore();
        }


        function drawCircle(ctx){
            ctx.save();

            var r = mCenter / 40; // size of point
            for(var i = 0; i < mCount; i ++){
                var x = mCenter + mRadius * Math.cos(mAngle * i) * mData[i][1] / 100;
                var y = mCenter + mRadius * Math.sin(mAngle * i) * mData[i][1] / 100;

                ctx.beginPath();
                ctx.arc(x, y, r, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(255, 0, 0, 0.8)';
                ctx.fill();
            }

            ctx.restore();
        }

    </script>
@endsection