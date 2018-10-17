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
    <div class="input-group">
        <select class="form-control" id="studentclass" >
            <?php
            while($class = array_shift($classes))
            {?>
            <option value="<?=$class->classname?>"><?=$class->classname?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <?php

    if(isset($students) && !empty($students))
    {
        $k = 0;
    ?>
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
                            <li class="list-group-item badge">
                                <button type="button " class="btn btn-danger btn_modal_del" data-toggle="modal" data-target="#delprofile<?=$student->regid;?>">Delete</button>
                                <!--Modal-->
                                <div class="modal fade in modal_delete" data-backdrop="static" data-keyboard="false" id="delprofile<?=$student->regid;?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <div><img src="<?=media('stopsign.png')?>"/></div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-danger" style="color: #000000;">
                                                    You are about to delete record for <code><?=$student->name;?></code>
                                                </div>

                                                <form action="/admin/<?=$student->regid?>/delete" method="post">
                                                    <button class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                    <input type="submit" class="btn btn-danger remove_student" value="Proceed" name="delete">
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Mdal-->
                            </li>
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
