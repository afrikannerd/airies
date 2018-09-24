<div class="profile container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title"><?= $user->name?>'s Profile</div>
        </div>
        <div class="panel-body">
            <table class="table  table-bordered">
                <tbody>
                <tr>
                    <td>Name</td>
                    <td><?= $user->name?></td>
                </tr>
                <tr>
                    <td>Adm No</td>
                    <td><?= $user->regid?></td>
                </tr>

                <tr>
                    <td>Class</td>
                    <td><?= $user->classname?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>Male</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>