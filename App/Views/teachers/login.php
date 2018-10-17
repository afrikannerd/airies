
<div class="login-form col-md-offset-3">
    <form action="/login/teacher" method="post" >
        <fieldset>
            <legend>Teachers Login</legend>
            <div class="form-group col-md-12">
                <label for="user_id">TSC Number</label>
                <input type="text"  class="user_id form-control" name="username" placeholder="Enter TSC number" onkeypress="return isNumeric(event)"/>
            </div>
            <div class="form-group col-md-12">
                <label for="pwd">Password</label>
                <input type="password"  class="pwd form-control" name="pwd" placeholder="Enter Password" />
            </div>
            <div class="form-group col-md-12  ">

                <input type="submit" name="login" class="btn btn-primary form-control" value="Log In" />
            </div>

                <small class="forgot-pw">In case of forgotten password,contact system administrator</small>
                <?php echo $pages;?>

        </fieldset>

    </form>
</div>
