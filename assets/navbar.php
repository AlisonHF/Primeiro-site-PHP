<nav class="navbar navbar-expand-sm" style="background-color: #DCDCDC;">
    <div class="container-fluid">

        <ul class="navbar-nav">
            <a class="navbar-brand" href="home.php"><i class="bi bi-tools"></i> HelpDesk</a>

            <?php
                
                $status_sessao = session_status();

                if ($status_sessao === 2) {
                    $autenticado = $_SESSION['autenticado'];

                    if ($autenticado === 'sim' && $autenticado != null){
            ?>
            <li class="nav-item">
                <a class="nav-link" href="abrir_chamado.php">Enviar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="consultar_chamado.php">Consultar</a>
            </li>
            <li class="nav-item" id="logoff">
                <a class="nav-link" href="sair_sessao.php" style="font-weight: bold;"><i class="bi bi-box-arrow-right"></i> Sair</a>
            </li>
            <?php }} ?>
        </ul>

    </div>
</nav>
