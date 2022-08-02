        <h3 class="azul">Administração do sistema Quinto Número</h3>
        <p>Olá, <?php echo $_SESSION['usuNome']; ?></p>
        <nav class="navbar navbar-expand-lg navbar-dark fundo-azul">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-white" href="<?php echo $rota('inicio', 'administracao'); ?>">Início</a>
                    <span class="nav-link text-white"><b>|</b></span>
                    <a class="nav-link text-white" href="<?php echo $rota('usuarios', 'usuario'); ?>">Usuários</a>
                    <span class="nav-link text-white"><b>|</b></span>
                    <a class="nav-link text-white" href="<?php echo $rota('perguntas', 'pergunta'); ?>">Perguntas</a>
                    <span class="nav-link text-white"><b>|</b></span>
                    <a class="nav-link text-white" href="<?php echo $rota('logout'); ?>">Sair</a>
                </div>
            </div>
        </nav>
        <h4 style="margin-top:5px"><?php echo $titulo; ?></h4>