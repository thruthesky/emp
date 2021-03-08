<?php




?>

    <h1>Home</h1>

<?php if ( loggedIn() ) { ?>
    어서오세요, <?=my(NAME)?>님.
<?php } else { ?>
    Please, login first.
<?php } ?>
    <div class="m-5">
        <a class="btn btn-warning" href="<?=passLoginUrl('openHome')?>"><?=ln(['en' => 'Pass Login', 'ko' => '패스 로그인'])?></a>
        <a class="btn btn-primary" href="/?p=user.register"><?=ln(['en' => 'Register', 'ko' => '회원 가입'])?></a>
        <a class="btn btn-primary" href="/?p=user.login"><?=ln(['en' => 'Login', 'ko' => '로그인'])?></a>
        <a class="btn btn-primary" href="/?p=user.profile"><?=ln(['en' => 'Profile', 'ko' => '회원 정보'])?></a>
        <a class="btn btn-primary" href="/?p=user.logout.submit"><?=ln(['en' => 'Logout', 'ko' => '로그아웃'])?></a>
        <a class="btn btn-primary" href="/?p=forum.post.list&categoryId=qna">QnA</a>

        <?php if ( admin() ) { ?>
            <a class="btn btn-primary" href="/?p=admin.index"><?=ln(['en' => 'Admin', 'ko' => '관리자'])?></a>
        <?php } ?>
<form action="/">
    <input type="hidden" name="p" value="setting.language.submit">
    <select name="language" onchange="this.form.submit()">
        <option value="">Choose language</option>
        <?php foreach( SUPPORTED_LANGUAGES as $ln ) { ?>
            <option value="<?=$ln?>"><?=ln($ln, $ln)?></option>
        <?php } ?>
    </select>
</form>
    </div>


<?php







