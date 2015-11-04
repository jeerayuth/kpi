
	<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
							<i class="glyphicon glyphicon-lock"></i>
							เข้าสู่ระบบบันทึกข้อมูลตัวชี้วัด 
						</h3>
                    </div>

                    <div class="panel-body">
                        <?php echo CHtml::form(array("site/login")) ;?>        
							<fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ชื่อผู้ใช้" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="รหัสผ่าน" name="password" type="password" value="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->                    
								<input type="submit" class="btn btn-lg btn-info btn-block" value="เข้าสู่ระบบ" />

                            </fieldset>
						<?php echo CHtml::endform() ;?>

                    </div>
                </div>
            </div>
        </div>
    </div>
