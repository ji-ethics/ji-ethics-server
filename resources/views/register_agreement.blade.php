<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Agreement</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

@include('Header1')

<div class = "row" style="margin:2%;">
    <div class="col-xs-1 col-sm-1 col-md-1"> </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <br/>
        <h3 class="text-center">   Shanghai Jiao Tong University, University of Michigan-Shanghai Jiao Tong University Joint Institute   </h3>
        <h3 class="text-center">   CONSENT TO PARTICIPATE IN A RESEARCH STUDY/HAVE ANSWERS COLLECTED AND ANALYZED   </h3>
        <h3 class="text-center">  Principal Investigator: Rockwell F. Clancy   </h3>
        <br/>
        <div >
            <font size="5">
            <p> <strong> Confidentiality </strong>: Please answer as honestly and thoroughly as possible. No specific answers or identifying information will be disclosed publicly. </p>
            <p> <strong>Purpose</strong>: To better understand the nature of and views about morality and topics related to applied ethics. </p>
            <p> <strong>Procedures</strong>: If you consent to participate, you can read a variety of materials and answers questions about them. </p>
            <p> <strong>Potential Risks or Discomforts</strong>: There should not be any risks or discomforts. You will be asked to honestly and thoughtfully answer questions about yourself, knowledge, and views. </p>
            <p> <strong>Potential Benefits</strong>: Better understand topics related to applied ethics, your own views of morality, as well as those of others </p>
            <p> <strong>Questions, Comments, or Concerns</strong>: If you have any questions, comments, or concerns about the research, you can contact Rockwell F. Clancy via email: rockwell.clancy@sjtu.edu.cn </p>
            </font>
        </div>
        <br/>
        <div >
            <font size="3">
            <div class="checkbox">
            <label>
                <input type="checkbox" value="1">
                I consent to participate in this study.
            </label>
            </div>
            <div class="checkbox">
            <label>
                <input type="checkbox" value="2">
                I consent to receive information regarding this work. (It's not necessary to check this one.)
            </label>
            </div>
            </font>
        </div>
        <?php
        $tmp = url("/register/info1");
        echo "<a href= $tmp><button type=\"submit\" class=\"btn btn-default\"> Next </button></a>"
        ?>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1"> </div>

</div>
<br/>
<br/>
<br/>


@include('Footer')
</body>
