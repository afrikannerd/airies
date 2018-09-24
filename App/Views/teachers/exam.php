
<div class="container">

    <div class="panel col-md-offset-2 teacher-body">
        <div class="panel-heading">Exam Marks</div>
        <div class="panel-body">
            <div class=" table-responsive">
                <div class="form-group col-md-5">
                    <label for="class">
                        Select a class:
                    </label>
                    <select name="class" id="class" class="form-control">
                        <?php ?>
                        <option value="2D">2D</option>
                        <option value="1A">1A</option>
                        <option value="4A">4A</option>
                        <option value="3C">3C</option>
                        <option value="3B">3B</option>
                        <option value="3D" selected>3D</option>
                    </select>

                </div>
                <div class="form-group col-md-5">
                    <label for="subject">
                        Select a subject:
                    </label>
                    <select name="subject" id="subject" class="form-control">
                        <?php ?>
                        <option value="math" selected>Math</option>
                        <option value="chemistry">Chemistry</option>
                        <option value="physics">Physics</option>
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label for="student">
                        Enter Adm No:
                    </label>
                    <input type="text" name="student" id="student" class="form-control">
                </div>
                <div class="form-group col-md-5">
                    <label for="marks">
                        Enter Marks:
                    </label>
                    <input type="text" name="marks" id="marks" class="form-control">
                </div>
                <div class="form-group col-md-2 " style="margin-top: 5px;">
                    <label for="">

                    </label>
                    <button role="button" class="form-control btn btn-primary">Add Marks</button>
                </div>
                <div class="form-group col-md-2 " style="margin-top: 5px;">
                    <label for="">

                    </label>
                    <button role="button" class="form-control btn btn-primary">Update Marks</button>
                </div>
                <hr>
                <div class="form-group col-md-2 " style="margin-top: 5px;">
                    <label for="">

                    </label>
                    <button role="button" class="form-control btn btn-primary">View Marks</button>
                </div>
                <table class="table  table-bordered">
                    <thead>
                            <th>Student</th>
                            <th>Marks</th>
                            <th>Grade</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Maxwell</td>
                            <td>85</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Mike</td>
                            <td>66</td>
                            <td>B+</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>47</td>
                            <td>C-</td>
                        </tr>
                        <tr>
                            <td>Duncan</td>
                            <td>73-</td>
                            <td>A-</td>
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Class Mean</td>
                            <td>64.75</td>
                        </tr>
                        <tr>
                            <td>Grade</td>
                            <td>B+</td>
                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>
    </div>

</div>



