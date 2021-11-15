<?php 
    session_start(); //Inicia sessão
    if(isset($_SESSION['idUsuarios'])){
        header("Location: index.php");  //Leva o usuário para tela home caso esteja logado
      }
    include_once 'headerGu.php';
?>

<!------ Include the above in your HEAD tag ---------->
<div class="container forget-password">
    <div class="row">
        <div class="col-md-12 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <a href="index.php"><img src="img/LOGO.png" alt="car-key" border="0"></a>
                        <h4  class="text-center"><i style="color:#007BFF;">Criar Conta</i> </h4>                                
                        <form action="includes/register.inc.php" method="POST" id="register-form" role="form" autocomplete="off" >
                            <div class="form-group">
                                <input type="text" id="floatingInputUsername" name="nome" placeholder="Nome" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" id="floatingInputUEmail" name="email" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                    <input type="password" id="floatingInputPassword" name="senha" placeholder="Senha" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" id="floatingInputPassword" name="Confirmarsenha" placeholder="Confirmar Senha" class="form-control">
                            </div>
                            <div class="form-group">                                        
                                <button type="submit" name="submit" class="btn btn-lg btn-primary btn-login fw-bold text-uppercase">Cadastrar usuário</button>
                            </div>
                            <div class="text-left"><a href="login.php"><i class="fas fa-arrow-left"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
<?php
// Pega a query error pra definir a mensagem de erro
    if(isset($_GET['error'])){
        if($_GET['error'] == 'missinginput'){
            echo '<p>You need to fill all the inputs!</p>';
        }
        elseif($_GET['error'] == 'differentpasswords'){
            echo '<p>Passwords are different</p>';
        }
        elseif($_GET['error'] == 'invalidemail'){
            echo '<p>Invalid email</p>';
        }
        elseif($_GET['error'] == 'emailtaken'){
            echo '<p>This email is already being used</p>';
        }
        elseif($_GET['error'] == 'failedtocreateaccount'){
            echo '<p>Failed to create account, try again</p>';
        }
        elseif($_GET['error'] == 'stmtfailed'){
            echo '<p>Internal error, please try again</p>';
        } 
    }
?>