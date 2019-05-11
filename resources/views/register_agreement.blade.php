@extends('layouts.app')
@section('content')

<div class = "row" style="margin:2%;">
    <div class="col-xs-1 col-sm-1 col-md-1"> </div>
    <div class="col-xs-10 col-sm-10 col-md-10">
        <br/>
        <h3 class="text-center">   Shanghai Jiao Tong University, University of Michigan-Shanghai Jiao Tong University Joint Institute   </h3>
        <h3 class="text-center">   CONSENT TO PARTICIPATE IN A RESEARCH STUDY/HAVE ANSWERS COLLECTED AND ANALYZED   </h3>
        <h3 class="text-center">  Principal Investigator: Rockwell F. Clancy   </h3>
        <br/>
        <div >

            <p> <strong> Confidentiality </strong>: Please answer as honestly and thoroughly as possible. No specific answers or identifying information will be disclosed publicly. </p>
            <p> <strong>Purpose</strong>: To better understand the nature of and views about morality and topics related to applied ethics. </p>
            <p> <strong>Procedures</strong>: If you consent to participate, you can read a variety of materials and answers questions about them. </p>
            <p> <strong>Potential Risks or Discomforts</strong>: There should not be any risks or discomforts. You will be asked to honestly and thoughtfully answer questions about yourself, knowledge, and views. </p>
            <p> <strong>Potential Benefits</strong>: Better understand topics related to applied ethics, your own views of morality, as well as those of others </p>
            <p> <strong>Questions, Comments, or Concerns</strong>: If you have any questions, comments, or concerns about the research, you can contact Rockwell F. Clancy via email: rockwell.clancy@sjtu.edu.cn </p>

        </div>
        <br/>
        <form action="/get_agreement" name="form_agreement" onsubmit="return is_check()" method="POST">
            {{ csrf_field() }}
        <div >
            <label style="display:none">
                <?php
                echo "<input name=\"id\" value=\"$id\">"
                ?>
            </label>
            <div class="checkbox">
            <label style="font-size:16px">
                <input type="checkbox" name="agreement1" id="check1" value="1">
                I consent to participate in this study.
            </label>
            </div>
            <div class="checkbox">
            <label style="font-size:16px">
                <input type="checkbox" name="agreement2" value="1">
                I consent to receive information regarding this work.
            </label>
            </div>
        </div>

        <button type="submit" class="btn btn-default"> Next </button>
        </form>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1"> </div>

</div>
{{--<br/>--}}
{{--<br/>--}}
{{--<br/>--}}
@endsection

@section('script')
    @parent
<script type="text/javascript">
    function is_check(){
        var statue = document.getElementById("check1");
        if(!statue.checked) {
            alert("You must agree to participate in this study!");
            statue.focus();
            return false;
        }

    }
</script>
@endsection
