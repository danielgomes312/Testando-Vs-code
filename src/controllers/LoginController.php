<?php
namespace src\controllers;

use \core\Controller;
use src\handlers\LoginHandler;

class LoginController extends Controller {

    public function signin() {
        # criando a variavel $flash.
        $flash = '';
        # Mostrar mensagem de erro caso não for um usuario cadastrado
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        #isso aqui deveria impedir a mensagem de continua depois do "F5" mas não está funcionando.
        #agora está funcionando.
        $this->render('signin', [
            'flash' => $flash
        ]);
    }

    public function signinAction() {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if ($email && $password) {
            $token = LoginHandler::verifyLogin($email, $password);
            if($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                # Aqui fica a frase que vai aparecer na mensagem, sem pre seguido do "$this".
                $_SESSION['flash'] = 'E-mail e/ou senha não conferem.';
                $this->redirect('/login');
            }
        } else {
            $_SESSION['flash'] = 'Campo vazio';
            $this->redirect('/login');
        }
    }

    public function signup() {
        # criando a variavel $flash.
        $flash = '';
        # Mostrar mensagem de erro caso já for um usuario cadastrado
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('signup', [
            'flash' => $flash
        ]);
    }

    public function signupAction() {
        #coleto dos dados.
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $birthdate = filter_input(INPUT_POST, 'birthdate');

        # Verifica se todos os dados foram colocados no cadastro.
        if($name && $email && $password && $birthdate) {
            # Verifica se foram colocados 3 informações na data entre os '/'.
            $birthdate = explode('/', $birthdate);
            if(count($birthdate) != 3) {
                $_SESSION['flash'] = 'Data de nascimento inválida!';
                $this->redirect('/cadastro');
            }
            # Verifica se a data é uma data real.
            $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
            if(strtotime($birthdate) === false) {
                $_SESSION['flash'] = 'Data de nascimento inválida!';
                $this->redirect('/cadastro');
            }
            # Realiza realmente o cadastro após todas as verificações.
            # Verifica se já tem um cadastro com esse email, caso retornar 'false' prossege com o cadastro.
            if(LoginHandler::emailExists($email) === false) {
                # Realiza realmente o cadastro após confirmar que o cadastro ainda não existe.
                $token = LoginHandler::addUser($name, $email, $password, $birthdate);
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                # Caso já for identificado o cadastro passar a mensagem de usuario já cadastrado e redireciona a pagina de cadastro.
                $_SESSION['flash'] = 'Email já está cadastrado!';
                $this->redirect('/cadastro');
            }
                
        # Caso não cumprir com os criterios retorna para a pagina de cadastro.

        } else {
            $_SESSION['flash'] = 'Campos Vazios!';
            $this->redirect('/cadastro');
        }
    }

}