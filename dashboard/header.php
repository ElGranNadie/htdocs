<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/** Información del usuario (id) */
$user_id = $_SESSION['user_id'] ?? null;

/** Información del usuario (nombre) */
$nombre_usuario = $_SESSION['usuario_nombre'] ?? null;

/** Información del usuario (premium) */
$es_premium = $_SESSION['usuario_premium'] ?? false;

// 👉 Detectar página actual
$current_page = basename($_SERVER['PHP_SELF']);

/** Página principal (inicio) */
$index = "/index.php";

/** Sección "Quiénes somos" */
$quienessomos = "/dashboard/quienes-somos.php";   

/** Sección "Qué hacemos" */
$quehacemos = "/dashboard/Nicole.php";

/** Sección "Contáctanos" */
$contactanos = "/dashboard/contactanos.php";

/** Iniciar sesion*/
$tlogin = "/dashboard/login.php";

/** Chat - solo si el usuario está logueado y no está en la página de chat */
$chat = "/dashboard/chat.php";
?>

<style>
/* Ajuste visual de los botones de usuario */
.nav-user {
    display: flex;
    align-items: center;
    gap: 10px;
}
.nav-user .btn {
    padding: 5px 10px;
    font-size: 14px;
}
</style>

<!-- SVG de iconos para toggle -->
<svg xmlns="http://www.w3.org/2000/svg" class="d-none"> 
    <symbol id="check2" viewBox="0 0 16 16"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path></symbol>
    <symbol id="circle-half" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path></symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16"><path d="M6 .278a.768.768 0 0 1 .08.858A7.208 7.208 0 0 0 5.202 4.6c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"></path></symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16"><path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zM8 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2zM16 8a.5.5 0 0 1-.5.5h-2a.5.5 0 1 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5H.5a.5.5 0 1 1 0-1h2A.5.5 0 0 1 3 8z"></path></symbol>
</svg> 

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top HeadYFoot"> 
    <div class="container-fluid"> 
        <a class="navbar-brand" style="color: var(--bs-emphasis-color-rgb);">N.I.C.O.L.E</a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"> 
            <span class="navbar-toggler-icon"></span> 
        </button> 
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Links de navegación -->
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item"><a class="nav-link" href="<?php echo $index ?>">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $quienessomos ?>">¿Quiénes Somos?</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $quehacemos ?>">Nicole</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo $contactanos ?>">Contáctanos</a></li>
                <?php if ($user_id && $current_page !== "chat.php"): ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $chat ?>">Chat</a></li>
                <?php endif; ?>
                <!-- Usuario / Premium / Login / Logout -->
                <div class="nav-user">
                    <?php if ($user_id): ?>
                        <?php if ($current_page === "chat.php" && !$es_premium): ?>
                            <li class="nav-item">
                                <a href="/dashboard/beneficios_premium.php" class="nav-link">✨ Pásate a Nicole Premium</a>
                            </li>
                        <?php elseif ($es_premium): ?>
                            <li class="nav-item">
                                <span class="nav-link">✨Premium</span>
                            </li>
                        <?php endif; ?>
                            <li class="nav-item">
                                <a href="logout.php" class="nav-link">Cerrar Sesión</a>
                            </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="<?php echo $tlogin ?>" class="nav-link">Iniciar Sesión</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <!-- Toggle modo oscuro/claro -->
                <div class="dropdown bd-mode-toggle">
                    <button class="btn btn-bd-primary py-1 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Toggle theme (light)">
                        <svg class="bi my-1 theme-icon-active" aria-hidden="true"><use href="#sun-fill"></use></svg>
                        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme">
                        <li><button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light"><svg class="bi me-2 opacity-50"><use href="#sun-fill"></use></svg>Claro<svg class="bi ms-auto d-none"><use href="#check2"></use></svg></button></li>
                        <li><button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"><svg class="bi me-2 opacity-50"><use href="#moon-stars-fill"></use></svg>Oscuro<svg class="bi ms-auto d-none"><use href="#check2"></use></svg></button></li>
                        <li><button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto"><svg class="bi me-2 opacity-50"><use href="#circle-half"></use></svg>Auto<svg class="bi ms-auto d-none"><use href="#check2"></use></svg></button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
// 🔹 Script para mantener tema oscuro/claro en todas las páginas
(function () {
    const storedTheme = localStorage.getItem('theme');
    const getPreferredTheme = () => storedTheme || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

    const setTheme = (theme) => {
        if (theme === 'auto') {
            document.documentElement.setAttribute('data-bs-theme', window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        } else {
            document.documentElement.setAttribute('data-bs-theme', theme);
        }
    };

    setTheme(getPreferredTheme());

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        if (getPreferredTheme() === 'auto') {
            setTheme('auto');
        }
    });

    document.querySelectorAll('[data-bs-theme-value]').forEach(toggle => {
        toggle.addEventListener('click', () => {
            const theme = toggle.getAttribute('data-bs-theme-value');
            localStorage.setItem('theme', theme);
            setTheme(theme);
        });
    });
})();
</script>
