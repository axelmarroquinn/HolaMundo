<nav class="navbar" role="navigation" aria-label="main navigation">

    <div class="navbar-brand">
        <a class="navbar-item" href="index.php?vista=home">
        <img src="./img/umg.png" width="65" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Catalogos</a>
                <div class="navbar-dropdown">
                    <a href="index.php?vista=bodega_new" class="navbar-item" >Nueva Bodega</a>
                    <a href="index.php?vista=tipo_new" class="navbar-item">Nuevo Tipo de Equipo</a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Usuarios</a>
                <div class="navbar-dropdown">
                    <a href="index.php?vista=usuario_new" class="navbar-item">Nuevo Usuario</a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Inventario de Equipos</a>
                <div class="navbar-dropdown">
                    <a href="index.php?vista=ingreso_new" class="navbar-item">Nuevo Ingreso</a>
                    <a href="index.php?vista=equipo_search" class="navbar-item">Actualizacion</a>
                    <a href="index.php?vista=equipo_general_list" class="navbar-item">Inventario General</a>                    
                </div>
            </div>

        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a href="index.php?vista=logout" class="button is-link">
                        Salir
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
    .navbar-start {
        display: flex;
        justify-content: center;
    }

    .navbar-item {
        margin-right: 0em;
    }
</style>
</nav>

