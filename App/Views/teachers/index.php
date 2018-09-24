


<div class="container">
    <?php teacher_nav();?>
    <?php teacher_sidebar();?>
    <div class="panel col-md-offset-2 teacher-body">
        <div class="panel-heading">Personal Details</div>
        <div class="panel-body">
            <div class="col-md-6 table-responsive">
                <table class="table  table-bordered">
                    <tbody>
                    <tr>
                        <td>Name</td>
                        <td><?=$user->name?></td>
                    </tr>
                    <tr>
                        <td>TSC No</td>
                        <td><?=$user->regid?></td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td><?=$user->contact?></td>
                    </tr>
                    
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


