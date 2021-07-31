<?php 
  //load LayoutTrangChu.php
  $this->layoutPath = "LayoutTrangChu.php";
 ?>
<div class="template-customer">
          <div id="layout-page" class="bgfafafa">
            <div class="container">
                <div id="customer-login">
                    <div id="login" class="userbox" style="display: block;">
                        <div style="text-align: center;">
                        <h1>Đăng nhập</h1>
                        <p><?php if(isset($_GET["notify"])&&$_GET["notify"]=="success"): ?>
                        <p style="color:red;">Đăng ký thành công</p>
                        <?php else: ?>
                        <p>Nếu bạn có tài khoản xin vui lòng đăng nhập</p>
                        <?php endif; ?></p>
                        </div>
                        <div class="large_form">           
                            <form method='post' action="index.php?controller=account&action=loginPost" class="f">
                                <ul>
                                    <input type="hidden" name="csrf" value="47d3f9b2e5551283de34fc52a1a4a287-5027385159cb764a9762df61f170828e">
                                    <li>
                                        <input name="Email" type="email" class="tb&#x20;validate&#x5B;required&#x5D;" id="username" placeholder="Email" value="">
                                    </li>
                                    <li>
                                        <input name="MatKhau" type="password" class="tb&#x20;validate&#x5B;required&#x5D;" id="MatKhau" placeholder="M&#x1EAD;t&#x20;kh&#x1EA9;u" value="">
                                    </li>
                                    <li class="btns">
                                        <input name="submit" type="submit" id="btnSubmit" class="htmlBtn&#x20;first" value="&#x0110;&#x0103;ng&#x20;nh&#x1EAD;p">
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div class="req_pass">
                            <a class="btn-more btn-register" href="/user/getpassword">Quên mật khẩu</a>
                            <a class="btn-more btn-register pull-right" href="index.php?controller=account&action=register" title="Đăng ký">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>