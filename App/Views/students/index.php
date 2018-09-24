
<div class="container">
    <?php student_nav();?>
    <?php student_sidebar();?>
    <div class="panel col-md-offset-2 student-body">
        <div class="panel-heading">Personal Details</div>
        <div class="panel-body">
                   <div class="col-md-6 table-responsive">
        <table class="table  table-bordered">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td><?=$this->session->get('name')?></td>
                        </tr>
                        <tr>
                            <td>Adm No</td>
                            <td><?=$this->session->get('username')?></td>
                        </tr>
                        <tr>
                            <td>Id</td>
                            <td><?=$this->session->get('id')?></td>
                        </tr>
                        <tr>
                            <td>Class</td>
                            <td>3A</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>Male</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 table-responsive">
                <table class="table  table-bordered">
                    <tbody>
                        <tr>
                            <td>Term Fee</td>
                            <td>50,000</td>
                        </tr>
                        <tr>
                            <td>Fee Paid</td>
                            <td>53,000</td>
                        </tr>
                        <tr>
                            <td>Fee Balance</td>
                            <td style="color: rgb(35,177,77);">3,000 <small>(Overpayment)</small></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>

