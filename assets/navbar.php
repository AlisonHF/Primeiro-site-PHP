<script src="assets/scripts.js"></script>
<nav class="navbar navbar-expand-sm" data-bs-theme="dark" style="background-color: #3C3C3C;">
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
                <a class="nav-link" aria-current="page" href="home.php" id="link-home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="abrir_chamado.php" id="link-enviar">Enviar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="consultar_chamado.php" id="link-consultar">Consultar</a>
            </li>
            <li class="nav-item" id="logoff">
                <a class="nav-link" href="scripts/sair_sessao.php" style="font-weight: bold;"><i class="bi bi-box-arrow-right"></i> Sair</a>
            </li>
            <?php }} ?>
        </ul>

        <script>destacaSecaoNavbar()</script>

    </div>
</nav>
