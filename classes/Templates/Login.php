<?php

namespace Templates;

class Login {

    public $root_dir;
    public $url='./';
    public $login_field='login';
    public $password_field='password';
    public $redirect_uri='/';
    public $context;

    public function setInputFields($login, $password) {
        $this->login_field=$login;
        $this->password_field=$password;
    }

    public function show($title="Вход в систему") {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?=$title?></title>
<link rel="stylesheet" type="text/css" href="/message.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
<h1><?=$this->context['title']?></h1>
<div class="panel panel-default">
<div class="panel-heading"><?=$title?></div>
<div class="panel-body">
<form method="POST" action="<?=$this->url?>">
<input type="hidden" name="redirect_uri" value="<?=$this->redirect_uri?>">
<div class="form-group">
<label for="inputEmail" class="col-xs-2 control-label">Логин:</label>
<input type="text" class="form-control" name="<?=$this->login_field?>" placeholder="Введите имя учётной записи">
</div>
<div class="form-group">
<label for="inputPassword" class="col-xs-2 control-label">Пароль:</label>
<input type="password" class="form-control" name="<?=$this->password_field?>" placeholder="Введите пароль">
</div>
<button type="submit" class="btn btn-default">Войти</button>
</form>
</div>
</div>
</div>
</body>
</html>
<?php
    }

}
