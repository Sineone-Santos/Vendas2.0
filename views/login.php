<?php $msg = $_SESSION['msg'] ?? null;
$email = $_SESSION['EMAIL'] ?? null;
unset($_SESSION['msg']);
unset($_SESSION['EMAIL']);
?>
<div class="row justify-content-center h-100 align-items-center mx-0">
    <div class="col-6 col-lg-8">
        <div class="row no-gutters shadow-lg">
            <div class="col-6 border-left-0 rounded-left">
                <div class="h-100 py-3">
                    <form class="m-4" action="<?= BASE_URL . '/auth/login' ?>" method="post">
                        <div class="d-flex align-items-center">

                            <h1 class="font-weight-normal mb-4">Login</h1>
                            <div class="ml-auto text-muted">
                                <i class="fab fa-facebook pr-2"></i>
                                <i class="fab fa-twitter "></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-monospace">email</label>
                            <input type="email" name="email" class="form-control form-control-sm border-0 rounded-pill p-3" placeholder="Usuario" value="<?php echo $email ?>">
                        </div>
                        <div class="form-group">
                            <label class="text-monospace">Senha</label>
                            <input type="password" name="password" class="form-control form-control-sm border-0 rounded-pill p-3" placeholder="Senha">
                            <p class="text-danger" style="font-size: 12px; font-weight: 300; font-family: 'sora', sans-serif;">
                        </div>
                        <p class="text=danger"><?php echo $msg ?></p>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-pink rounded-pill w-100 text-white text-center">Entrar</button>
                        </div>
                        <div class="d-flex align-items-center mt-3" style="font-size: 12px;">
                            <input type="checkbox" class="mx-2">
                            <label class="text-monospace m-0">lembre-se de mim</label>
                            <a class="ml-auto" href="#">Esqueceu a senha?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-6 bg-gradient border-right-0 rounded-right ">
                <div class="d-flex flex-column justify-content-center align-items-center h-100 text-white">
                    <h1>Bem vindo ao login</h1>
                    <p class="text-center">O melhor tradutor do mundo - DeepL Translate</p>
                    <a href="<?php echo BASE_URL . '/auth/register'; ?>">
                        <button class="btn border border-white rounded-pill text-white"> Registrar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>