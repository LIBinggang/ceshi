<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link type="image/x-icon" href="<?php echo IUrl::creatUrl("")."favicon.ico";?>" rel="icon">
    <title>商家管理中心</title>
    <script type="text/javascript" charset="UTF-8" src="/iWebShop5.7.0303/runtime/_systemjs/jquery/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" charset="UTF-8" src="/iWebShop5.7.0303/runtime/_systemjs/artdialog/artDialog.js?v=20190606"></script><script type="text/javascript" charset="UTF-8" src="/iWebShop5.7.0303/runtime/_systemjs/artdialog/plugins/iframeTools.js"></script><link rel="stylesheet" type="text/css" href="/iWebShop5.7.0303/runtime/_systemjs/artdialog/skins/black.css" />
    <link rel="stylesheet" href="<?php echo $this->getWebSkinPath()."css/admin.css";?>" type="text/css" />
    <script type='text/javascript' src='<?php echo IUrl::creatUrl("")."public/javascript/public.js";?>'></script>
</head>
<body>
<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <h1><?php echo $this->_siteConfig->name;?>商家管理</h1>
                            </div>
                            <p>登陆商家后台，可以进行商品、订单、营销、统计等管理操作，让您对店铺生意了如指掌</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            <form method="post" name="login" action="<?php echo IUrl::creatUrl("/systemseller/login");?>" autoComplete="off" class="form-horizontal">
                                <div class="form-group">
                                    <input type="text" name="username" class="input-material" placeholder="请输入用户名">
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" class="input-material" placeholder="请输入密码">
                                </div>
                                <button id="login" type="submit" class="btn btn-primary">立即登陆</button>
                            </form>

                            <small>还没有商家账号？</small>
                            <a href="<?php echo IUrl::creatUrl("/simple/seller");?>" class="signup">马上注册</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyrights text-center">
        <p>Power By <a href="http://www.aircheng.com" target="_blank" class="external">iWebShop</a></p>
    </div>
</div>
</body>
</html>