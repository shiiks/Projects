<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css">
<h2 class="chat-header">
    <i class="fa fa-comment"></i> WTO 
    <a href="javascript:;" class="chat-form-close pull-right">
        <i class="fa fa-remove"></i>
    </a>
</h2>
<div class="colored" >
 <div class="col-md-12"></div>
    <div class="col-md-12">
            <div class="col-md-12  contcustom" id="contentdiv" >
                <form method="POST" id="register-frm">

                    <span>
                    <img src="../../../../../img/mun.png">
					</span>
                    <br>
                    <h2>Register</h2>
                    <div class="message"></div>


                    <div class="form-group">
                        <input type="text" name="country" id="country" class="form-control" placeholder="Country" required="required" autofocus="autofocus"/>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required="required" autofocus="autofocus"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" id="Username" class="form-control" placeholder="Username" required="required" autofocus="autofocus"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="required" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required="required" />
                    </div>
              
                    <button class="btn btn-block btn-default btn-success" id="register" type="submit"><i class="fa fa-plus-circle"></i> Register</button>
                    <br>
                </form>
                <button class="btn btn-block btn-default btn-primary goback"> <i class="fa fa-arrow-circle-left"></i> Back to Login</button>
            </div>
    </div>
</div>