<div class="profile container row offset main" id="main"">

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title"><?= $user->name;?>'s Profile</div>
        </div>
        <div class="panel-body">

            <table class="table  table-bordered">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td><?= $user->name;?></td>
                    </tr>
                    <tr>
                        <td>Adm No</td>
                        <td><?= $user->regid;?></td>
                    </tr>

                    <tr>
                        <td>Class</td>
                        <td><?= $user->classname;?></td>
                    </tr>

                    <tr>
                        <td>Transfer Student</td>
                        <td><?= $user->transfer==1?"Yes":"No";?></td>
                    </tr>
                    <tr>
                        <td>Former School</td>
                        <td><?= $user->fromm;?></td>
                    </tr>
                    <tr>
                        <td>Parent</td>
                        <td><?= $user->guardian;?></td>
                    </tr>
                    <tr>
                        <td>Parent Contact</td>
                        <td><?= $user->guardiancontact;?></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><?= date_diff(new \DateTime($user->dob),new DateTime())->y;?> Years</td>
                    </tr>
                    <tr>
                        <td>County</td>
                        <td><?= $user->county;?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>