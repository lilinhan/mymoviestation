<div class="row">
    <div class="col-xs-2" id="logo">
        <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQzzvSomiESdsI-AGapf_fM9ukcNL08bpA33bz-Jnv_Lyof_jj1sg" class="img-circle">
    </div>

    <div class="col-xs-10">
        <form class="form-horizontal"  role="form" id="search">
            <div class="row">
                <div class="col-xs-offset-1 col-xs-8">
                    <div class="search-form-group">
                        <input type="text" class="form-control" id="search_name"
                               placeholder="请输入名字">

                        <button type="button" class="btn btn-primary" id="btn_search">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                </div>
                <div class="col-xs-offset-1 col-xs-2">
                    <?php
                        if ($_SESSION['login'] == true) {
                            echo '<a href="ucenter.php" class="bg-info" style="text-decoration: underline">个人中心</a> ';
                            echo '<button class="btn btn-primary btn-logout" type="button">退出</button>';
                        } else {
                            echo '<button class="btn btn-primary btn-signin" type="button">登录</button>';
                        }
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="signin-wrapper">
    <form id="signin" class="form-horizontal">
        <legend class="text-center">Login</legend>
        <div class="form-group">
            <label for="username" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" id="email" placeholder="email">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-default" id="btn_submit">Sign in</button>
            </div>
        </div>
    </form>
</div>