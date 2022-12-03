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
        <form method="POST" action="<?=$base?>/cadastro">
            <!--Verificação para que a mensagem de erro apareça no html em caso de senha ou email incorretos
        
            OBS: não considera se os campos estiverem vazios-->
            <?php if(!empty($flash)): ?>
                <div class="flash"><?php echo $flash; ?></div>
            <?php endif; ?>

            <input placeholder="Digite o seu nome completo" class="input" type="text" name="name" />
            
            <input placeholder="Digite seu e-mail" class="input" type="email" name="email" />

            <input placeholder="Digite sua senha" class="input" type="password" name="password" />
            
            <input placeholder="Digite sua Data de nascimento" class="input" type="text" name="birthdate" id="birthdate"/>

            <input class="button" type="submit" value="Fazer cadastro" />
            <!--Link para ir para a pagina de login -->
            <a href="<?=$base?>/login">Já tem conta? Faça login</a>
        </form>
    </section>

<script src="https://unpkg.com/imask"></script>
<script> 
IMask(
    document.getElementById('birthdate'),
    {
        mask:'00/00/0000'
    }
)
</script>
</body>
</html>