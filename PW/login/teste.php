<?php
require "Usuario.class.php";

$con = $usuario = new Usuario();


if(isset($_POST['btnCadastrar'])){
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; 
    if(!$con){
        echo "<script>
                 confirm('Erro ao conectar. Tente mais tarde!')
              </script>";  
    }
    else{
        $user = $usuario->chkUser($email);
        
        if($user){
            echo "<script>
                    alert('Usuario ja cadastrado!');
                </script>";
                header('Location: login.php');
        }else{
            $exito = $usuario->cadastrar($nome, $email, $senha);
                if($exito){
                    echo "<script>
                        confirm('Usuario inserido com sucesso!');
                    </script>";  
                    
                }else{
                echo "<script>
                    alert('Erro ao CADASTRAR. Tente mais tarde!');
                </script>";  
                }
        }
    }
}else if (isset($_POST['btnEntrar'])){
    $email = $_POST['email'];
    $senha = $_POST['senha']; 

    $user = $usuario -> chkPass($email, $senha);
    if ($user > 0){
        $name = $user['nome'];
        echo "<script>alert('Usuário logado! Seja muito bem vindo, $name!');</script>";
        echo "<h2>Usuarios encontrados no banco >></h2>";
        echo "<pre>";
        echo var_dump($user);
        }else{
        echo "<script>alert('Erro, Usuário ou senha incorretos!');</script>";
    }
}else if(isset($_POST['btnDelete'])){
    $id = $_POST['id'];
    $del = $usuario -> delUser($id);
    if($del == true){
        // echo "Usuario com ID $id excluido com sucesso!";
        echo "<script>alert('Usuario com o ID: $id excluido com sucesso!');</script>";
        sleep(3);
        echo "<script>window.location.href = 'login.php';</script>";
    }else{
        echo "Usuario com ID não encontrado no banco de dados!";
    }
}else if(isset($_POST['btnModify'])){
    $email = $_POST['email'];
    $newName = $_POST['novoNome'];

    $modify = $usuario -> alterUser($email, $newName);

    if($modify == 1){
        echo "Nome do usuario $newName Atualizado com sucesso";
    }else{
        echo "Erro interno, nome de usuario não atualizado!";
    }
}