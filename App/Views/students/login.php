
<div class="login-form col-md-offset-3">
    <form action="/login/student" method="post" >
        <fieldset>
            <legend>Student Login</legend>
            <div class="form-group col-md-12">
                <label for="user_id">Admission Number</label>
                <input type="text"  class="user_id form-control" name="username" placeholder="Enter Admission number" onkeypress="return isNumeric(event)"/>
            </div>
            <div class="form-group col-md-12">
                <label for="pwd">Password</label>
                <input type="password"  class="pwd form-control" name="pwd" placeholder="Enter Password" />
            </div>
            <div class="form-group col-md-12  ">

                <input type="submit"  class="btn btn-primary form-control" name="login" value="Log In" />
            </div>

                <small class="forgot-pw">In case of forgotten password,contact system administrator</small>


        </fieldset>

    </form>
</div>
