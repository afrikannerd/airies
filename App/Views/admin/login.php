<div class="login-form col-md-offset-3">
    <form action="/login/admin" method="post" >
        <fieldset>
            <legend>Admin Login</legend>
            <div class="form-group col-md-12">
                <label for="user_id">ID</label>
                <input type="text"  class="user_id form-control" name="username" placeholder="Enter Email" />
            </div>
            <div class="form-group col-md-12">
                <label for="pwd">Password</label>
                <input type="password"  class="pwd form-control" name="pwd" placeholder="Enter Password" />
            </div>
            <div class="form-group col-md-12  ">

                <input type="submit"  name="login" class="btn btn-primary form-control" value="Log In" />
            </div>

                <small class="forgot-pw">In case of forgotten password,contact system administrator</small>


        </fieldset>

    </form>
</div>
