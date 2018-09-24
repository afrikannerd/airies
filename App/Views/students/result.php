<div class="container">
    <?php student_nav();?>
    <?php student_sidebar();?>
    <div class="panel col-md-offset-2 student-body">
        <div class="panel-heading">Exam Results</div>
        <div class="panel-body">
            <div class=" table-responsive">
                <div class="form-group col-md-5">
                    <label for="year">
                        Select a year:
                    </label>
                    <select name="year" id="year" class="form-control">
                        <?php //Starting from the year the student joined the school?>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018" selected>2018</option>
                    </select>

                </div>
                <div class="form-group col-md-5">
                    <label for="term">
                        Select a term:
                    </label>
                    <select name="term" id="term" class="form-control">
                        <?php //Starting from the year the student joined the school?>
                        <option value="1" selected>1st Term</option>
                        <option value="2">2nd Term</option>
                        <option value="3">3rd Term</option>
                    </select>
                </div>
                <div class="form-group col-md-2 " style="margin-top: 5px;">
                    <label for="">

                    </label>
                    <button role="button" class="form-control btn btn-primary">View Result</button>
                </div>
                <table class="table  table-bordered">
                    <thead>
                    <th>Subject</th>
                    <th>Score</th>
                    <th>Grade</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Math</td>
                        <td>46</td>
                        <td>C+</td>
                    </tr>
                    <tr>
                        <td>English</td>
                        <td>66</td>
                        <td>B+</td>
                    </tr>
                    <tr>
                        <td>Physics</td>
                        <td>35</td>
                        <td>D</td>
                    </tr>
                    <tr>
                        <td>Chemistry</td>
                        <td>73</td>
                        <td>A</td>
                    </tr>

                    </tbody>
                    <tfoot>
                    <tr>
                        <td>Mean</td>
                        <td>55.00</td>
                    </tr>
                    <tr>
                        <td>Grade</td>
                        <td>C+</td>
                    </tr>
                    </tfoot>
                </table>
            </div>


        </div>
    </div>
</div>