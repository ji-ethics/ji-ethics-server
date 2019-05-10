@extends('admin.Header')
@section('content')

<div class="row" style="margin:2%;">
    <div class="col-xs-1 col-sm-1 col-md-1"></div>
    <div class="col-xs-12 col-sm-10 col-md-10">
        <caption><h1 class="text-center">All Users</h1></caption>
        <table class = "table table-hover">
        <thead style="font-size:15px;text-align:center;vertical-align:center">
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Type</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Nationality</th>
                <th> </th>
                <th> </th>
            </tr>
        </thead>
        <tbody style="font-size:13px;text-align:center;vertical-align:middle">
        <?php
        $allusers = json_decode($allusers,true);
        $i = 1;
        foreach($allusers as $key)
            {
                $id = $i; $i++;
                $user_id = $key['id'];
                $users_username = $key['user_name'];
                $users_email = $key['email'];
                $users_firstname = $key['first_name'];
                $users_lastname = $key['last_name'];
                $users_usertype = $key['usertype'];
                $users_age = $key['age'];
                $users_gender = $key['gender'];
                $users_nationality = $key['nationality'];
                echo"<tr>";
                echo"<th>$id</th>";
                echo"<th>$users_username</th>";
                echo"<th>$users_email</th>";
                echo"<th>$users_firstname</th>";
                echo"<th>$users_lastname</th>";
                echo"<th>$users_usertype</th>";
                echo"<th>$users_age</th>";
                echo"<th>$users_gender</th>";
                echo"<th>$users_nationality</th>";
                $link_detail = url("/user/detail/$user_id");
                echo"<th><a class=\"btn btn-default\" href= $link_detail> details</a></th>";
                $link_delete = url("/user/delete/$user_id");
                echo"<th><a class=\"btn btn-default\" href= $link_delete onclick =\"return delete_confirm()\"> delete</a></th>";
                echo"</tr>";
            }
        ?>
        </tbody>
        </table>
        <br>
        <br>
        <?php
        $link_admin_main = url("/admin");
        echo"<a class=\"btn btn-default\" href=$link_admin_main >Back</a>";
        ?>
    </div>
    <div class="col-xs-1 col-sm-1 col-md-1"></div>

</div>
@endsection

@section('script')
    @parent
<script type="text/javascript">
function delete_confirm()
{
    var msg = "Do you want to delete this user?";
    if(confirm(msg)){
        return true;
    }else{
        return false;
    }
}
</script>
@endsection