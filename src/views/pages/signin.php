<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login - PHP</title>
    <meta name="viewport" content="<?=$base;?>/width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href=""><img src="<?=$base;?>/assets/images/devsbook_logo.png" /></a>
        </div>
    </header>
    <section class="container main">
        <form method="POST" action="<?=$base?>/login">
            <!--Verificação para que a mensagem de erro apareça no html em caso de senha ou email incorretos
        
            OBS: não considera se os campos estiverem vazios-->
            <?php if(!empty($flash)): ?>
                <div class="flash"><?php echo $flash; ?></div>
            <?php endif; ?>
            
            <input placeholder="Digite seu e-mail" class="input" type="email" name="email" />

            <input placeholder="Digite sua senha" class="input" type="password" name="password" />

            <input class="button" type="submit" value="Acessar o sistema" />
            <!--Link para ir para a pagina de cadastro -->
            <a href="<?=$base?>/cadastro">Ainda não tem conta? Cadastre-se</a>
        </form>
    </section>
</body>
</html>