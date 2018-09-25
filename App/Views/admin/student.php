<div class="row offset main" id="main">
    <h3 class="page-header">Students</h3>
    <section class="content">
        <div class="row">
            <div class="container-fluid">
                <div class="btn-group ">
                    <button class="btn btn-primary add-new" type="button" >Add New Student</button>
                    <a href="/admin/viewstudent" class="btn btn-primary view_student" type="button" >View Students</a>
                    <a href="/admin/remove/" class="btn btn-danger" type="button" >Remove Student</a>
                </div>
            </div>
        </div>    
        
        <div class="panel_content">
            <div class="panel add_student_form">
                <form action="/add/student" method="POST">
                    <div class="panel-heading">Add New Student</div>
                    <div class="panel-body">
                        <div class="form-group col-md-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required="required" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="admno">Admission Number</label>
                            <input type="number" name="admno" id="admno" class="form-control" required/>
                        </div>
                        <?php if(!empty($classes))
                        {?>
                            <div class="form-group col-md-3">
                                <label for="class">Class</label>
                                <select name="class" id="class" class="class form-control">
                                    <?php
                                    while ($class = array_shift($classes))
                                    {?>

                                        <option value="<?= $class->id; ?>"><?= $class->classname; ?></option>

                                    <?php }?>
                                </select>
                            </div>
                        <?php }?>
                        <div class="form-group col-md-3">
                            <label>Date of Birth</label>
                            <input type="date" name="dob"  class="form-control" required/>
                        </div>
                        <?php if(!empty($counties))
                        {?>
                            <div class="form-group col-md-3">
                                <label>County</label>
                                <select name="county" id="class" class="class form-control">
                                    <?php
                                    while ($county = array_shift($counties))
                                    {?>

                                        <option value="<?= $county->id; ?>"><?= $county->name; ?></option>

                                    <?php }?>
                                </select>
                            </div>
                        <?php }?>
                        <div class="form-group col-md-3">
                            <label>Transfer</label>
                            <label for="yes">Yes</label>
                            <input type="radio" name="transfer" id="yes"   value="1" required/>
                            <label for="No">No</label>
                            <input type="radio" name="transfer"  id="No" value="0" required/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="prev_school">Previous School</label>
                            <input type="text" name="prev_school" id="prev_school" class="form-control" required/>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="postal-box">Home Address</label>
                            <input type="text" name="box" id="postal-box" class="form-control" required/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Primary Guardian</label>
                            <input type="text" name="guardian"  class="form-control" required/>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Contact</label>
                            <input type="text" name="guard-contact"  class="form-control" required/>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Password</label>
                            <input type="text" name="pwd"  value="sunshine123" class="form-control"  />
                        </div>

                        <div class="form-group col-md-3">

                            <button type="submit" class="btn  btn-primary add-student" id="addnew">Add</button>

                        </div>

                    </div>
                </form>

            </div>
            <div id="info">
                <?=sess_message();?>

            </div>
        </div>

    </section>
</div>
