@extends('admin.Header')

@section('content')
    <script language="javascript">
        function ReSel(){
            for(i=0;i<document.form1.logs.length;i++){
                document.form1.logs[i].checked = true;
            }
        }
        function DelSel(){
            for(i=0;i<document.form1.logs.length;i++){  //这一用法只对form表单有效
                document.form1.logs[i].checked = false;  //如果是实现【全不选】的话，改成false即可
            }
        }
    </script>
        <div class="padding">

        <div><h1>Data Analysis</h1></div>


        <div class="row">
            <div class="col-xs-1 col-sm-2 col-md-2"></div>
            <div class="col-xs-12 col-sm-8 col-md-8">
                <h2>Users</h2>

                <form action="/dataanalysissubmit" method="POST">
                    {{ csrf_field() }}
                    <label style="display:none">
                        <?php
                        echo "<input name=\"questionid\" value=\"$id\">"
                        ?>
                    </label>
                <?php
                    $answer="";
                    $user=json_decode($user,true);
                    echo "<h4>This question has been answered by: </h4>";
                    foreach ($user as $students){
                        $question=$students['id'];
                        $id=$students['user_id'];
                        $lastname=$students['last_name'];
                        $firstname=$students['first_name'];
                        $answer=$answer.$id.",";

                        echo"<div>$firstname, $lastname; </div>";
                        echo"<br/>";

                    }
                ?>
                    <br/>
                    <h2>Choose Users</h2>
                    <div class="form-group">
                        <?php
                        $answer = substr($answer,0,strlen($answer)-1);
                        echo"<textarea name=\"userid\">$answer</textarea>";
                        ?>
                    </div>



                    <div class="form-group" style="display:none;">
                        <?php
                        echo"<textarea name=\"type\" >$type</textarea>";
                        ?>
                    </div>

                    <br/>
                    <div>
                        <h2>Function</h2>


                        <input type="radio" name="Function" value="R" checked="checked">Regression


                        <input type="radio" name="Function" value="C">Clustering


                        <input type="radio" name="Function" value="RC">Regression & Clustering


                        <input type="radio" name="Function" value="N"> Default


                        <input type="radio" name="Function" value="G"> Auto-Grading(choose one student only)

                    </div>

                    <div>
                        <h2>The Focus Property(Only for Regression)</h2>
                        <h4>Age</h4>
                        <input type="radio" name="Focus" value="age" checked="checked">
                        <h4>Income</h4>
                        <input type="radio" name="Focus" value="income_rmb">
                    </div>
                    <button type="submit" class="btn btn-default" >submit</button>
                </form>
            </div>
            </div>

        </div>


        <div class="col-xs-1 col-sm-2 col-md-2"></div>
    </div>
@endsection