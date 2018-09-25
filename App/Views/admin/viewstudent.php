<div class="row offset main" id="main">
    <h3 class="page-header">Students</h3>
    <section class="content">
        <div class="row">
            <div class="container-fluid">
                <div class="btn-group ">
                    <a href="/admin/students" class="btn btn-primary add-new" type="button" >Add New Student</a>
                    <a href="/admin/viewstudent" class="btn btn-primary view_student" type="button" >View Students</a>
                    <a href="/admin/removestudent"  class="btn btn-danger" type="button" >Remove Student</a>
                </div>
            </div>
        </div>
        <?= sess_message()?>
    <table class="  student-list">
        <thead>
            <th class="stud-no">#</th>
            <th class="stud-admno">Admno</th>
            <th class="stud-name">Name</th>
            <th class="stud-class">Class</th>
            <th class="stud-action"></th>
        </thead>
        <tbody>
        <?php
        if(isset($students) && !empty($students))
        {
            $k = 0;
            while ($student = array_shift($students))
            {
                ?>
                <tr>
                    <td><?=++$k;?></td>
                    <td><?=$student->regid;?></td>
                    <td><?=$student->name;?></td>
                    <td><?=$student->classname;?></td>
                    <td>
                        <ul class="list-inline list-group">
                            <li class="list-group-item badge"><a href="/admin/<?=$student->regid;?>/edit">Edit</a> </li>
                            <li class="list-group-item badge"><a href="/admin/<?=$student->regid;?>/delete">remove</a></li>
                            <li class="list-group-item badge"><a href="/admin/<?=$student->regid;?>/">view</a></li>
                        </ul>
                    </td>
                </tr>
        <?php
            }
        }else{
            ?>
            <tr>
                <td>No students found</td>
            </tr>
        <?php
        }
        ?>
        </tbody>

    </table>
</div>