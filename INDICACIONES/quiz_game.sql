-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2025 a las 23:52:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quiz_game`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_pregunta`
--

CREATE TABLE `categoria_pregunta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pregunta_id` bigint(20) UNSIGNED NOT NULL,
  `categoria` enum('CRI','PE','CSIS','AMACSS','DAE') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_pregunta`
--

INSERT INTO `categoria_pregunta` (`id`, `pregunta_id`, `categoria`, `created_at`, `updated_at`) VALUES
(1, 1, 'CSIS', NULL, NULL),
(2, 2, 'AMACSS', NULL, NULL),
(3, 3, 'AMACSS', NULL, NULL),
(4, 4, 'CSIS', NULL, NULL),
(5, 5, 'CSIS', NULL, NULL),
(6, 6, 'AMACSS', NULL, NULL),
(7, 7, 'AMACSS', NULL, NULL),
(8, 8, 'AMACSS', NULL, NULL),
(9, 9, 'CSIS', NULL, NULL),
(10, 10, 'CSIS', NULL, NULL),
(11, 11, 'CSIS', NULL, NULL),
(12, 12, 'PE', NULL, NULL),
(13, 12, 'DAE', NULL, NULL),
(14, 13, 'AMACSS', NULL, NULL),
(15, 14, 'AMACSS', NULL, NULL),
(16, 15, 'PE', NULL, NULL),
(17, 15, 'DAE', NULL, NULL),
(18, 16, 'CRI', NULL, NULL),
(19, 17, 'AMACSS', NULL, NULL),
(20, 18, 'PE', NULL, NULL),
(21, 18, 'DAE', NULL, NULL),
(22, 19, 'AMACSS', NULL, NULL),
(23, 20, 'AMACSS', NULL, NULL),
(24, 21, 'AMACSS', NULL, NULL),
(25, 22, 'CSIS', NULL, NULL),
(26, 23, 'CSIS', NULL, NULL),
(27, 24, 'PE', NULL, NULL),
(28, 24, 'DAE', NULL, NULL),
(29, 25, 'CSIS', NULL, NULL),
(30, 26, 'CRI', NULL, NULL),
(31, 27, 'CSIS', NULL, NULL),
(32, 28, 'AMACSS', NULL, NULL),
(33, 29, 'CSIS', NULL, NULL),
(34, 30, 'AMACSS', NULL, NULL),
(35, 31, 'AMACSS', NULL, NULL),
(36, 32, 'PE', NULL, NULL),
(37, 32, 'DAE', NULL, NULL),
(38, 33, 'AMACSS', NULL, NULL),
(39, 34, 'CRI', NULL, NULL),
(40, 35, 'PE', NULL, NULL),
(41, 35, 'DAE', NULL, NULL),
(42, 36, 'PE', NULL, NULL),
(43, 36, 'DAE', NULL, NULL),
(44, 37, 'CSIS', NULL, NULL),
(45, 38, 'CRI', NULL, NULL),
(46, 39, 'CRI', NULL, NULL),
(47, 40, 'CRI', NULL, NULL),
(48, 41, 'CRI', NULL, NULL),
(49, 42, 'CRI', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_18_011734_create_preguntas_table', 1),
(5, '2025_10_18_190100_create_categoria_pregunta_table', 2),
(6, '2025_10_18_190250_remove_categoria_from_preguntas_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pais` varchar(255) NOT NULL,
  `enunciado` text NOT NULL,
  `respuesta` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pais`, `enunciado`, `respuesta`, `created_at`, `updated_at`) VALUES
(1, 'Finlandia', '¿Cual es el nombre completo de la tecnologia de servidor web de Microsoft que se utiliza para alojar aplicaciones web y servicios en el entorno Windows Server?', 'IIS', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(2, 'Argentina', '¿En SCRUM el objetivo del Sprint puede cambiarse durante el Sprint? (Colocar respuesta en mayúsculas)', 'NO', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(3, 'México', 'En SCRUM Si un miembro del equipo tiene un problema técnico que le impide avanzar en su tarea durante un sprint, ga quien debe acudir primero para resolverlo? (Colocar respuesta en mayúsculas)', 'SCRUM MASTER', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(4, 'Noruega', '¿Cuál es el nombre del mensaje que envía una computadora cuando acepta la oferta de un servidor DHCP?', 'DHCPREQUEST', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(5, 'Nueva Caledonia', '¿Qué valor numérico corresponde a permisos de lectura, escritura y ejecucion para el propietario, y solo lectura para el grupo y otros?', '744', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(6, 'Belice', 'La abreviatura WIP en Kanban ¿que significa en espanol?(Colocar respuesta en mayúsculas)', 'TRABAJO EN PROCESO', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(7, 'Honduras', '\"Kanban\" es una palabra japonesa ¿que significa?', 'SEÑAL VISUAL', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(8, 'Nicaragua', '¿Las practicas de refactorizacion son comunes en XP?(Colocar respuesta en mayúsculas)', 'SI', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(9, 'Surinam', '¿Cual es nombre del archivo con la ruta completa de configuración para DHCP en Linux?', '/etc/dhcp/dhcpd.conf', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(10, 'Estonia', '¿Cual es el nombre del archivo donde se almacena el usuario root en Linux?', 'passwd', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(11, 'Bélgica', '¿Cual es el archivo principal de configuración para el servidor DNS en Debian?', 'named.conf', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(12, 'Guayana Francesa', 'Se presenta un arreglo con los siguientes datos: string[] data = { \"que\", \"va\", \"el\", \"va\", \"tal\", \"hola\", \"desafio\" } y se hace la siguiente impresión: Console.Write(string.Join(\" \", data.Where(p => p.Length == 3))); Cual es la cadena de salida:', 'que tal', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(13, 'Uzbekistán', 'Un Agente externo en SCRUM ¿es llamado también ?. (Colocar respuesta en mayúsculas)', 'STAKEHOLDER', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(14, 'China', '¿Cual es el limite maximo de integrantes en Crystal Orange?', '50', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(15, 'Burkina Faso', 'Se desea filtrar los nombres de los empleados cuyo registro tiene mas de 5 letras, y contar cuantos registros hay, para ello tenemos el siguiente código, analiza: var nombres = new[] { \"Mario\", \"Cristina\", \"Luis\", \"Fernando\", \"Ana\", \"Alejandra\" }; var nombresLargos = nombres .PALABRA1(n => n.PALABRA2 > 5) .ToList(); int cantidadLarga = nombresLargos.Count(); Al final, logramos el objetivo filtrando en \"nombresLargos\" y contando cuantos hay en \"cantidadLarga\", pero en el codigo faltan dos palabras de la sintaxis de C#, que corresponden a PALABRA1 y PALABRA2. Escribe en la respuesta la palabra correcta para que la sintaxis no sea errónea, tanto para PALABRA1 y PALABRA2, en tu respuesta solo deja un espacio entre ambas palabras. (todo en minúsculas)', 'where length', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(16, 'Bután', '¿Cuál de las siguientes máscaras de subred se representa con la notación de barra diagonal /20? Consulte imagen adjunta ....', '255.255.240.0', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(17, 'Mozambique', '¿Qué herramienta visual es la base de Kanban?(Colocar respuesta en mayúsculas)', 'TABLERO', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(18, 'Italia', 'Utiliando arrays en C#, vamos ingresar estos datos: {\"que\",\"va\", \"el\", \"va\",\"tal\",\"hola\",\"desafio\"} Aplicando el siguiente algoritmo: var cont=0 por cada valor en el arreglo: si el valor. length es mayor a cont cont=valor.length imprimir (valor + \" \") Cual es la cadena de la salida:', 'que hola desafio', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(19, 'Croacia', 'Es responsable del flujo de trabajo dentro de un sistema Kanban y/o determinados ítems de trabajo. (Colocar respuesta en mayúsculas)', 'SERVICE DELIVERY MANAGER', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(20, 'Bulgaria', '¿Quién prioriza las historias de usuario en XP?(Colocar respuesta en mayúsculas)', 'CLIENTE', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(21, 'Túnez', '¿Quién tiene la última palabra sobre la prioridad de los elementos en el Product Backlog en SCRUM?(Colocar respuesta en mayusculas)', 'PRODUCT OWNER', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(22, 'Kosovo', 'Al configurar una GPO para restringir el uso del panel de control para todos los usuarios en un dominio. ¿Cual es el comando que utilizarias para aplicar esta política?', 'gpupdate /force', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(23, 'Tanzania', '¿Cual es la ruta predeterminada de la carpeta donde se almacenan los archivos de los sitios web en IIS donde C representa la letra del disco duro?', 'C:\\inetpub\\wwwroot', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(24, 'Uganda', 'Se solicita que un buen programador analice el siguiente código de C#: var productos = new[] { new { Nombre = \"Laptop\", Precio = 1500.00M }, new { Nombre = \"Tablet\", Precio = 300.00M }, new { Nombre = \"Smartphone\", Precio = 800.00M }, new { Nombre = \"Monitor\", Precio = 250.00M }, new { Nombre = \"Mouse\", Precio = 20.00M } }; var productosFiltrados = productos .Where(p => p.Precio >= 500) .OrderByDescending(p => p.Precio) .ToList(); int cantidadProductos = productosFiltrados.Count(); no podemos compilar, pero el analisis del programador indicara respuesta el valor de la variable \"cantidadProductos\"', '3', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(25, 'Gabón', '¿Cuál es la representación de permisos en letras para el valor numérico 755?', 'rwxr-xr-x', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(26, 'Lesoto', 'Consulte la ilustración. ¿Cuántos dominios de broadcast hay?', '4', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(27, 'Siria', '¿Cuál es el servicio en Windows que gestiona la autenticación de usuarios?', 'Active Directory', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(28, 'Timor Oriental', 'Se encarga de gestionar la demanda y los requisitos dentro del sistema Kanban(Colocar respuesta en mayúsculas)', 'SERVICE REQUEST MANAGER', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(29, 'Israel', 'Necesitas verificar la direccion IP del dominio example.com. ¿Cual es el comando que utilizarías en la línea de comandos para realizar esta consulta de DNS?', 'nslookup example.com', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(30, 'Camerún', '¿Cuantas versiones de Crystal de IBM existen?', '5', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(31, 'Togo', '¿En SCRUM el Sprint Backlog puede incluir elementos que no estan en el Product Backlog? (Colocar respuesta en mayúsculas)', 'NO', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(32, 'Libia', 'Como todo buen programador, observa y analiza el siguiente código: var numeros = new[] { 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 }; var numerosPares = numeros .Where(n => <aqui falta algo>) .ToList(); int cantidadPares = numerosPares.Count(); El valor de la variable cantidadPares debe ser 5, pero si notas hay un bloque de código que falta en el espacio <aqui falta algo>, escribe en la respuesta a este desafío el código que falta para lograr la respuesta esperada. Escribe todo en minúsculas sin dejar espacios.', 'n%2==0', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(33, 'Namibia', 'En Kanban son aquellas actividades que disminuyen o ralentizan los procesos de produccion, aumentando los tiempos de espera y reduciendo la productividad, lo que genera, a su vez, un mayor coste final del producto. (Colocar respuesta en mayusculas)', 'CUELLOS DE BOTELLA', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(34, 'Costa Rica', '¿Qué parte del URL http://www.cisco.com/index.html representa el dominio DNS de nivel superior? Ver imagen adjunta ...', '.com', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(35, 'Eritrea', 'En tecnologias de Microsoft, para el tratamiento de datos en estructuras de datos, usamos LinQ, observa el siguiente código: var calificaciones = new[] { 80, 90, 70, 85, 95, 60, 88 }; var calificacionesFiltradas = calificaciones .Where (c => c >= 80) .ToList(); double promedio = [aqui falta tu código] Al final, si observas, se esta asignando un valor a la variable promedio, se hace mediante el bloque de codigo que falta. Tu escribiras en la casilla de la respuesta el codigo faltante usando LinQ .... Lo que se espera es que en la variable promedio se guarde el promedio de las calificaciones que estan en el array de arriba \"calificacionesFiltradas\". Escribe tu respuesta sin espacios, respetando mayúsculas y minúsculas de la sintaxis de C#', 'calificacionesFiltradas.Average();', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(36, 'Malaui', 'Como buen programador, debes tener la capacidad de analizar código fuente que tu no has realizado, observa el siguiente: var personas = new[] { new { Nombre = \"Juan\", Edad = 20 }, new { Nombre = \"Luisa\", Edad = 25 }, new { Nombre = \"Diego\", Edad = 19 }, new { Nombre = \"Carla\", Edad = 23 }, new { Nombre = \"Andrés\", Edad = 22 } }; int sumaEdades = personas .Where(p => p.Edad > 21) .Sum(p => p.Edad); te pregunto, qué valor esta guardado en la variable \"sumaEdades\" despues de compilar este fragmento de código', '70', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(37, 'Azerbaiyán', 'Nombre del archivo con la ruta completa que se utiliza para configurar un sitio virtual en Apache', '/etc/apache2/sites-available/000-default.conf', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(38, 'Eslovenia', '¿Qué tipo de conector usa una tarjeta de interfaz de red? Ver imagen adjunta ...', 'RJ-45', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(39, 'Rumanía', 'Un administrador de red debe mantener la privacidad de la ID de usuario, la contrasena y el contenido de la sesion cuando establece conectividad remota con la CLI con un switch para administrarla. ¿Que metodo de acceso se debe elegir?', 'SSH', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(40, 'Hungría', '¿Cuál de las siguientes mascaras de subred se utilizaria si hubiera 5 bits de host disponibles? ver imagen adjunta ...', '255.255.255.224', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(41, 'Ghana', 'Un mensaje se envia a todos los hosts en una red remota ¿Qué tipo de mensaje es? ver imagen adjunta ...', 'BROADCAST DIRIGIDO', '2025-10-18 20:15:16', '2025-10-18 20:15:16'),
(42, 'Ucrania', '¿Cuál es el proceso que se utiliza para colocar un mensaje dentro de otro para transferirlo del origen al destino? Ver imagen adjunta ....', 'Encapsulamiento', '2025-10-18 20:15:16', '2025-10-18 20:15:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LtHZmJaRkKaMFAph44vNwx2qMTWXyi2GXNmjAzzW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNngxV3ZqSUkzdExXSENjTkgwcUJqWTZScWxMb3RDbkI4d3pRUlZVNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcmVndW50YXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1760820434);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `categoria_pregunta`
--
ALTER TABLE `categoria_pregunta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoria_pregunta_pregunta_id_categoria_unique` (`pregunta_id`,`categoria`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_pregunta`
--
ALTER TABLE `categoria_pregunta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria_pregunta`
--
ALTER TABLE `categoria_pregunta`
  ADD CONSTRAINT `categoria_pregunta_pregunta_id_foreign` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
