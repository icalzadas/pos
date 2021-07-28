-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-07-2021 a las 10:24:25
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `puntoventa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

DROP TABLE IF EXISTS `cajas`;
CREATE TABLE IF NOT EXISTS `cajas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sucursal` int(11) NOT NULL,
  `caja` varchar(15) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_cajas` (`id_sucursal`,`caja`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `id_sucursal`, `caja`, `descripcion`) VALUES
(1, 1, 'caja 1', 'caja principal'),
(2, 1, 'caja 2', 'caja secundaria'),
(3, 1, 'caja 3', 'caja 3 prueba'),
(7, 1, 'caja 4', 'probando'),
(8, 2, 'caja 1', 'probado'),
(14, 1, 'caja 5', 'puertafdfdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_categoria` (`categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `status`) VALUES
(1, 'Dama', 1),
(2, 'Caballero', 1),
(3, 'Niño', 1),
(4, 'Niña', 1),
(5, 'Bebes', 1),
(6, 'Extras', 1),
(7, 'Pijamas', 1),
(8, 'categoria ropa', 1),
(9, 'categoria extra', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(50) DEFAULT NULL,
  `materno` varchar(50) DEFAULT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `limite_credito` float DEFAULT NULL,
  `dias_credito` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_clientes_rfc` (`rfc`),
  UNIQUE KEY `unique_clientes_curp` (`curp`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `paterno`, `materno`, `calle`, `colonia`, `ciudad`, `cp`, `telefono`, `rfc`, `curp`, `limite_credito`, `dias_credito`) VALUES
(1, 'Publico en general', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Ivan', 'CG', NULL, 'turqueza', 'lagos', 'Veracruz', NULL, NULL, NULL, NULL, 5000, 15),
(3, 'pepe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'pecas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'pecas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'pica', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_x_cobrar`
--

DROP TABLE IF EXISTS `cuentas_x_cobrar`;
CREATE TABLE IF NOT EXISTS `cuentas_x_cobrar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `limite_credito` float DEFAULT NULL,
  `dias_credito` smallint(6) DEFAULT NULL,
  `fecha_venta` date NOT NULL,
  `fecha_cobro` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cxc_ventas` (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuentas_x_cobrar`
--

INSERT INTO `cuentas_x_cobrar` (`id`, `id_venta`, `limite_credito`, `dias_credito`, `fecha_venta`, `fecha_cobro`) VALUES
(1, 50, 5000, 15, '2021-06-02', '2021-06-02'),
(2, 51, 5000, 15, '2021-06-02', '2021-06-02'),
(3, 52, 5000, 15, '2021-06-02', '2021-06-02'),
(4, 53, 5000, 15, '2021-05-18', '2021-05-18'),
(5, 54, 5000, 15, '2021-06-02', '2021-06-02'),
(6, 55, 5000, 15, '2021-06-02', '2021-06-02'),
(7, 56, 5000, 15, '2021-05-18', '2021-05-18'),
(8, 57, 5000, 15, '2021-05-18', '2021-05-18'),
(9, 58, 5000, 15, '2021-05-18', '2021-06-02'),
(10, 59, 5000, 15, '2021-06-02', '2021-06-02'),
(11, 60, 5000, 15, '2021-05-18', '2021-06-02'),
(12, 61, 5000, 30, '2021-05-18', '2021-06-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

DROP TABLE IF EXISTS `detalle_ventas`;
CREATE TABLE IF NOT EXISTS `detalle_ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `precio_venta` double NOT NULL,
  `subtotal` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detalle_ventas` (`id_venta`),
  KEY `fk_productos_ventas` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=77215 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id`, `id_venta`, `id_producto`, `cantidad`, `precio_venta`, `subtotal`, `total`) VALUES
(77151, 9, 4, 1, 130, 130, 130),
(77152, 9, 1, 1, 350, 350, 350),
(77153, 10, 4, 1, 130, 130, 130),
(77154, 11, 4, 1, 130, 130, 130),
(77155, 11, 1, 1, 350, 350, 350),
(77156, 12, 4, 1, 130, 130, 130),
(77157, 13, 4, 1, 130, 130, 130),
(77158, 13, 1, 1, 350, 350, 350),
(77159, 13, 7, 1, 150, 150, 150),
(77160, 14, 4, 1, 130, 130, 130),
(77161, 14, 1, 1, 350, 350, 350),
(77162, 15, 4, 1, 130, 130, 130),
(77163, 16, 4, 1, 130, 130, 130),
(77164, 17, 4, 1, 130, 130, 130),
(77165, 18, 4, 1, 130, 130, 130),
(77166, 19, 4, 1, 130, 130, 130),
(77167, 20, 4, 1, 130, 130, 130),
(77168, 20, 1, 1, 350, 350, 350),
(77169, 21, 4, 1, 130, 130, 130),
(77170, 22, 1, 1, 350, 350, 350),
(77171, 23, 4, 1, 130, 130, 130),
(77172, 23, 4, 1, 130, 130, 130),
(77173, 24, 4, 1, 130, 130, 130),
(77174, 24, 7, 1, 150, 150, 150),
(77175, 25, 4, 2, 130, 260, 260),
(77176, 25, 1, 2, 350, 700, 700),
(77177, 26, 4, 1, 130, 130, 130),
(77178, 26, 1, 1, 350, 350, 350),
(77179, 27, 4, 2, 130, 260, 260),
(77180, 28, 1, 1, 350, 350, 350),
(77181, 29, 31, 1, 120, 120, 120),
(77182, 30, 31, 1, 120, 120, 120),
(77183, 31, 31, 1, 120, 120, 120),
(77184, 32, 31, 2, 120, 240, 240),
(77185, 33, 33, 3, 60, 180, 180),
(77186, 36, 11, 1, 130, 130, 130),
(77187, 37, 11, 1, 130, 130, 130),
(77188, 38, 32, 1, 60, 60, 60),
(77189, 39, 32, 1, 60, 60, 60),
(77190, 40, 32, 1, 60, 60, 60),
(77191, 41, 32, 1, 60, 60, 60),
(77192, 42, 32, 1, 60, 60, 60),
(77193, 43, 32, 1, 60, 60, 60),
(77194, 44, 32, 1, 60, 60, 60),
(77195, 45, 32, 1, 60, 60, 60),
(77196, 46, 32, 1, 60, 60, 60),
(77197, 47, 32, 1, 60, 60, 60),
(77198, 47, 2, 1, 150, 150, 150),
(77199, 48, 32, 1, 60, 60, 60),
(77200, 48, 32, 1, 60, 60, 60),
(77201, 49, 32, 1, 60, 60, 60),
(77202, 50, 32, 1, 60, 60, 60),
(77203, 51, 32, 1, 60, 60, 60),
(77204, 52, 32, 1, 60, 60, 60),
(77205, 53, 32, 1, 60, 60, 60),
(77206, 54, 32, 1, 60, 60, 60),
(77207, 55, 32, 1, 60, 60, 60),
(77208, 56, 32, 1, 60, 60, 60),
(77209, 57, 32, 1, 60, 60, 60),
(77210, 58, 32, 1, 60, 60, 60),
(77211, 59, 32, 1, 60, 60, 60),
(77212, 60, 32, 1, 60, 60, 60),
(77213, 61, 32, 1, 60, 60, 60),
(77214, 62, 32, 2, 60, 120, 120);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_03_06_205202_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_stock`
--

DROP TABLE IF EXISTS `movimientos_stock`;
CREATE TABLE IF NOT EXISTS `movimientos_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sucursal` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` smallint(11) NOT NULL,
  `tipo_movimiento` varchar(25) NOT NULL COMMENT 'venta, devolución, agregar, quitar',
  PRIMARY KEY (`id`),
  KEY `fk_movimientos_sucursales` (`id_sucursal`),
  KEY `fk_movimientos_productos` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimientos_stock`
--

INSERT INTO `movimientos_stock` (`id`, `id_sucursal`, `id_producto`, `cantidad`, `tipo_movimiento`) VALUES
(1, 1, 31, 8, 'ALTA_PRODUCTO'),
(2, 1, 32, 10, 'ALTA_PRODUCTO'),
(3, 2, 33, 10, 'ALTA_PRODUCTO'),
(4, 2, 35, 10, 'ALTA_PRODUCTO'),
(5, 1, 31, 1, 'VENTA_PRODUCTO'),
(6, 1, 31, 1, 'VENTA_PRODUCTO'),
(7, 1, 31, 2, 'VENTA_PRODUCTO'),
(8, 2, 33, 3, 'VENTA_PRODUCTO'),
(9, 1, 32, 1, 'VENTA_PRODUCTO'),
(10, 1, 32, 1, 'VENTA_PRODUCTO'),
(11, 1, 32, 1, 'VENTA_PRODUCTO'),
(12, 1, 32, 1, 'VENTA_PRODUCTO'),
(13, 1, 32, 1, 'VENTA_PRODUCTO'),
(14, 1, 32, 1, 'VENTA_PRODUCTO'),
(15, 1, 32, 1, 'VENTA_PRODUCTO'),
(16, 1, 32, 1, 'VENTA_PRODUCTO'),
(17, 1, 32, 1, 'VENTA_PRODUCTO'),
(18, 1, 32, 1, 'VENTA_PRODUCTO'),
(19, 1, 32, 1, 'VENTA_PRODUCTO'),
(20, 1, 32, 1, 'VENTA_PRODUCTO'),
(21, 1, 32, 1, 'VENTA_PRODUCTO'),
(22, 1, 32, 1, 'VENTA_PRODUCTO'),
(23, 1, 32, 1, 'VENTA_PRODUCTO'),
(24, 1, 32, 1, 'VENTA_PRODUCTO'),
(25, 1, 32, 1, 'VENTA_PRODUCTO'),
(26, 1, 32, 1, 'VENTA_PRODUCTO'),
(27, 1, 32, 1, 'VENTA_PRODUCTO'),
(28, 1, 32, 1, 'VENTA_PRODUCTO'),
(29, 1, 32, 1, 'VENTA_PRODUCTO'),
(30, 1, 32, 1, 'VENTA_PRODUCTO'),
(31, 1, 32, 1, 'VENTA_PRODUCTO'),
(32, 1, 32, 1, 'VENTA_PRODUCTO'),
(33, 1, 32, 1, 'VENTA_PRODUCTO'),
(34, 1, 32, 2, 'VENTA_PRODUCTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones_caja`
--

DROP TABLE IF EXISTS `operaciones_caja`;
CREATE TABLE IF NOT EXISTS `operaciones_caja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_caja` int(11) NOT NULL,
  `id_user` int(11) NOT NULL COMMENT 'usuario al que se le abre la caja',
  `fecha_apertura` datetime DEFAULT NULL,
  `monto_apertura` float DEFAULT NULL,
  `fecha_cierre` datetime DEFAULT NULL,
  `monto_cierre` float DEFAULT NULL,
  `estatus` tinyint(4) NOT NULL COMMENT '1:abierta, 0:cerrada',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `operaciones_caja`
--

INSERT INTO `operaciones_caja` (`id`, `id_caja`, `id_user`, `fecha_apertura`, `monto_apertura`, `fecha_cierre`, `monto_cierre`, `estatus`) VALUES
(1, 1, 2, '2021-02-26 21:49:52', 500, '2021-02-27 19:17:15', 6570, 0),
(4, 2, 2, '2021-02-27 11:42:13', 200, NULL, NULL, 1),
(5, 1, 2, '2021-02-27 19:21:11', 500, '2021-02-27 19:24:21', 350, 0),
(6, 1, 2, '2021-02-27 20:13:05', NULL, '2021-02-28 11:13:29', 0, 0),
(7, 3, 3, '2021-02-28 11:15:17', 500, '2021-05-15 14:39:10', 0, 0),
(8, 1, 2, '2021-02-28 11:16:04', 1000, '2021-02-28 11:19:31', 0, 0),
(9, 1, 1, '2021-02-28 11:44:24', 400, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_sucursales`
--

DROP TABLE IF EXISTS `permisos_sucursales`;
CREATE TABLE IF NOT EXISTS `permisos_sucursales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_permisos_sucursales` (`id_user`,`id_sucursal`),
  KEY `fk_permisos_sucursales_sucursales` (`id_sucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos_sucursales`
--

INSERT INTO `permisos_sucursales` (`id`, `id_user`, `id_sucursal`) VALUES
(1, 1, 1),
(5, 1, 2),
(7, 1, 3),
(3, 2, 1),
(6, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sucursal` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `sku` varchar(15) NOT NULL COMMENT 'código único asigando manualmente a cada producto',
  `codigo_barras` varchar(255) DEFAULT NULL,
  `precio_costo` double NOT NULL,
  `precio_venta` double NOT NULL,
  `precio_mayoreo` double DEFAULT NULL,
  `minimo` int(11) DEFAULT NULL,
  `maximo` int(11) DEFAULT NULL,
  `talla` varchar(30) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `cantidad_inicial` smallint(6) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_sucursal_producto_sku` (`id_sucursal`,`producto`,`sku`),
  UNIQUE KEY `unique_sucursal_producto` (`id_sucursal`,`producto`),
  UNIQUE KEY `unique_sucursal_sku` (`id_sucursal`,`sku`),
  KEY `fk_productos_categorias` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_sucursal`, `id_categoria`, `producto`, `sku`, `codigo_barras`, `precio_costo`, `precio_venta`, `precio_mayoreo`, `minimo`, `maximo`, `talla`, `modelo`, `color`, `cantidad_inicial`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 'pantalon', '1', '123456789', 250, 350, NULL, 1, 50, '32', 'vaqueri', 'azul', 10, 1, '2021-02-05 21:32:07', '2021-02-17 17:10:12'),
(2, 1, 1, 'producto gabardina', '2', NULL, 125, 150, NULL, 1, 10, NULL, NULL, NULL, 10, 0, '2021-02-05 21:42:49', '2021-02-17 18:07:23'),
(3, 1, 1, 'producto gabardinas', '3', NULL, 100, 150, NULL, 1, 10, NULL, NULL, NULL, 10, 1, '2021-02-05 21:43:42', '2021-02-05 21:43:42'),
(4, 1, 2, 'vestido dama', '4', NULL, 100, 130, NULL, 1, 50, NULL, NULL, NULL, 20, 1, '2021-02-05 21:46:16', '2021-03-01 16:34:44'),
(5, 1, 2, 'prueba', '5', NULL, 100, 150, NULL, 1, 5, NULL, NULL, NULL, 5, 0, '2021-02-05 21:50:09', '2021-05-30 16:15:11'),
(6, 1, 1, 'prueba2', '6', NULL, 100, 150, NULL, 1, 5, NULL, NULL, NULL, 5, 1, '2021-02-05 21:53:30', '2021-02-05 21:53:30'),
(7, 1, 1, 'producto3', '7', NULL, 100, 150, NULL, 1, 10, NULL, NULL, NULL, 5, 1, '2021-02-05 21:55:55', '2021-02-05 21:55:55'),
(8, 1, 1, 'producto4', '8', NULL, 100, 150, NULL, 1, 5, NULL, NULL, NULL, 5, 1, '2021-02-05 22:06:11', '2021-02-05 22:06:11'),
(9, 1, 1, 'productonuevo modi', '9', NULL, 110, 150, NULL, 1, 5, NULL, NULL, NULL, 5, 0, '2021-02-05 22:23:33', '2021-02-17 16:55:41'),
(10, 1, 3, 'short', '00001', NULL, 50, 80, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, '2021-02-17 18:09:27', '2021-02-17 18:11:53'),
(11, 1, 7, 'pantalon pijama', '00002', NULL, 90, 130, 140, NULL, NULL, NULL, NULL, NULL, 5, 1, '2021-03-01 10:07:20', '2021-03-01 10:07:20'),
(12, 1, 1, 'dama', '00004', NULL, 75, 85.5, 80, 11, 9000, NULL, NULL, NULL, 3005, 1, '2021-03-01 12:58:57', '2021-03-01 13:00:19'),
(13, 1, 1, 'coca', '10', '123456', 100, 150, 145, 1, 10, '', '', '', 10, 1, NULL, NULL),
(16, 2, 1, 'coca', '10', '123456', 100, 150, 145, 1, 10, '', '', '', 10, 1, NULL, NULL),
(26, 2, 1, 'coca800', '123', '123456', 100, 150, 145, 1, 10, NULL, NULL, NULL, 10, 0, NULL, '2021-03-01 16:37:08'),
(27, 1, 1, 'coca600', '123', '123456', 100, 150, 145, 1, 10, '', '', '', 10, 1, NULL, NULL),
(30, 1, 1, 'coca700', '00003', '12345', 7, 8, NULL, 1, 5, NULL, NULL, NULL, 10, 0, '2021-03-01 15:23:59', '2021-03-01 16:43:13'),
(31, 1, 7, 'pijama', '000005', NULL, 100, 120, 150, NULL, NULL, NULL, NULL, NULL, 8, 1, '2021-03-01 16:51:05', '2021-03-01 17:04:52'),
(32, 1, 1, 'balon', '0005balon', NULL, 50, 60, NULL, NULL, NULL, NULL, NULL, NULL, 10, 1, '2021-03-01 17:15:40', '2021-03-01 17:15:40'),
(33, 2, 1, 'balon', '0005balon', NULL, 50, 60, NULL, NULL, NULL, NULL, NULL, NULL, 10, 1, '2021-03-01 17:15:40', '2021-03-01 17:15:40'),
(35, 2, 1, 'balonnuevo', '5555', NULL, 50, 60, NULL, NULL, NULL, NULL, NULL, NULL, 10, 1, '2021-03-01 17:18:57', '2021-03-01 17:18:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-03-07 02:59:58', '2021-03-07 02:59:58'),
(2, 'cajero', 'web', '2021-03-07 03:00:51', '2021-03-07 03:00:51'),
(3, 'vendedor', 'web', '2021-03-07 03:01:02', '2021-03-07 03:01:02'),
(4, 'almacenista', 'web', '2021-05-19 22:06:54', '2021-05-19 22:06:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sucursal` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `referencia` varchar(20) DEFAULT NULL COMMENT 'aquí se guardara de que acción viene el stock, por ejemplo si fue alta de producto nuevo pondré producto_agreagdo',
  PRIMARY KEY (`id`),
  KEY `fk_stock_sucursales` (`id_sucursal`),
  KEY `fk_stock_productos` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id`, `id_sucursal`, `id_producto`, `cantidad`, `referencia`) VALUES
(1, 1, 31, 7, 'ALTA_PRODUCTO'),
(2, 1, 32, -9, 'ALTA_PRODUCTO'),
(3, 2, 33, 7, 'ALTA_PRODUCTO'),
(4, 2, 35, 10, 'ALTA_PRODUCTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

DROP TABLE IF EXISTS `sucursales`;
CREATE TABLE IF NOT EXISTS `sucursales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sucursal` varchar(100) NOT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `estatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_sucursales` (`sucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `sucursal`, `calle`, `colonia`, `ciudad`, `estatus`) VALUES
(1, 'Sucursal 1', NULL, NULL, NULL, 1),
(2, 'Sucursal 2', NULL, NULL, NULL, 1),
(3, 'la nueva', 'callesdsdsd', 'coloniasdsd', 'mexiucoisdsd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_pago`
--

DROP TABLE IF EXISTS `tipos_pago`;
CREATE TABLE IF NOT EXISTS `tipos_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_pago` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_pago`
--

INSERT INTO `tipos_pago` (`id`, `tipo_pago`) VALUES
(1, 'Efectivo'),
(2, 'Credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `nick` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_name` (`name`),
  UNIQUE KEY `unique_nick` (`nick`),
  UNIQUE KEY `unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `nick`, `email`, `telefono`, `password`, `image`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Ivan', 'ivan25gtr', 'ivan25gtr@gmail.com', '2291291885', '$2y$10$3h35tmb7HuyHueVUegEbqeANCtT70huJqA4rTGIJSs90O1SmHNoRS', NULL, '2021-02-04 03:41:03', '2021-02-04 03:41:03', NULL),
(2, 'Cajero prueba', 'cajero1', 'cajero@mail.com', NULL, '$2y$10$7sdbV/KCAatHkQaIbO/kqehhKwnTBvAZanYhqy1NR/rf/RdgABe4.', NULL, '2021-02-26 20:56:50', '2021-02-26 20:56:50', NULL),
(3, 'Cajero prueba 2', 'cajero2', 'cajero2@mail.com', NULL, '$2y$10$1WSxwSigjdRRnNkdGvC45uI2IORlEC8KPEkY.Lk3LVLedeXUSwF56', NULL, '2021-02-27 20:32:58', '2021-02-27 20:32:58', NULL),
(5, 'juanito perez gomez', 'jperez', 'jperez@jperez.com', '2229', '', NULL, '2021-03-07 11:01:03', '2021-03-07 16:07:59', NULL),
(6, 'dfdfdf', 'dfdfdf', 'dfdff@df.com', NULL, '$2y$10$f72dDbBqDx7KXczkiUqPvevIAgcDITwLL8Blo3UNgDhr.3mkKEbye', NULL, '2021-05-14 18:12:58', '2021-05-14 18:12:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sucursal` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tipo_pago` int(11) NOT NULL,
  `id_operacion_caja` int(11) NOT NULL,
  `fecha_venta` datetime NOT NULL,
  `hora_venta` time DEFAULT NULL,
  `efectivo` double DEFAULT NULL,
  `cambio` double DEFAULT NULL,
  `cobrado_sn` tinyint(4) NOT NULL COMMENT '1:si,0:no',
  `subtotal` double NOT NULL,
  `total` double NOT NULL,
  `estatus` tinyint(1) NOT NULL COMMENT '1:activa, 0:cancelada',
  PRIMARY KEY (`id`),
  KEY `fk_ventas_sucursales` (`id_sucursal`),
  KEY `fk_ventas_clientes` (`id_cliente`),
  KEY `fk_ventas_users` (`id_user`),
  KEY `fk_ventas_tipos_pago` (`id_tipo_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_sucursal`, `id_cliente`, `id_user`, `id_tipo_pago`, `id_operacion_caja`, `fecha_venta`, `hora_venta`, `efectivo`, `cambio`, `cobrado_sn`, `subtotal`, `total`, `estatus`) VALUES
(9, 1, 1, 1, 1, 1, '2021-02-20 00:00:00', NULL, 100, 0, 1, 100, 100, 0),
(10, 1, 1, 1, 1, 1, '2021-02-19 00:00:00', NULL, 100, 0, 1, 100, 100, 1),
(11, 1, 1, 1, 1, 1, '2021-02-20 00:00:00', NULL, 700, 220, 1, 480, 480, 1),
(12, 1, 1, 1, 1, 1, '2021-02-20 00:00:00', NULL, 500, 370, 1, 130, 130, 1),
(13, 1, 1, 1, 1, 1, '2021-02-20 20:27:24', NULL, 800, 170, 1, 630, 630, 1),
(14, 1, 1, 1, 1, 1, '2021-02-20 22:18:49', NULL, 850, 370, 1, 480, 480, 1),
(15, 1, 1, 1, 1, 1, '2021-02-20 22:20:03', NULL, 200, 70, 1, 130, 130, 1),
(16, 1, 1, 1, 1, 1, '2021-02-20 22:22:39', NULL, 200, 70, 1, 130, 130, 1),
(17, 1, 1, 1, 1, 1, '2021-02-20 22:24:33', NULL, 200, 70, 1, 130, 130, 1),
(18, 1, 1, 1, 1, 1, '2021-02-20 22:27:47', NULL, 300, 170, 1, 130, 130, 1),
(19, 1, 1, 1, 1, 1, '2021-02-20 22:30:47', NULL, 250, 120, 1, 130, 130, 1),
(20, 1, 1, 1, 1, 1, '2021-02-20 22:31:11', NULL, 500, 20, 1, 480, 480, 1),
(21, 1, 1, 1, 1, 1, '2021-02-20 22:33:01', NULL, 200, 70, 1, 130, 130, 1),
(22, 1, 1, 1, 1, 1, '2021-02-20 22:33:20', NULL, 400, 50, 1, 350, 350, 1),
(23, 1, 1, 1, 1, 1, '2021-02-21 11:24:07', NULL, 400, 140, 1, 260, 260, 1),
(24, 1, 1, 1, 1, 1, '2021-02-21 11:27:06', NULL, 400, 120, 1, 280, 280, 1),
(25, 1, 1, 1, 1, 1, '2021-02-21 13:59:45', NULL, 1000, 40, 1, 960, 960, 1),
(26, 1, 1, 1, 1, 1, '2021-02-21 14:02:08', NULL, 480, 0, 1, 480, 480, 1),
(27, 1, 1, 2, 1, 1, '2021-02-27 17:04:02', NULL, 300, 40, 1, 260, 260, 1),
(28, 1, 1, 2, 1, 5, '2021-02-27 19:23:46', NULL, 350, 0, 1, 350, 350, 1),
(29, 1, 1, 1, 1, 9, '2021-03-01 17:48:07', NULL, 130, 10, 1, 120, 120, 0),
(30, 1, 1, 1, 1, 9, '2021-03-01 17:49:22', NULL, 130, 10, 1, 120, 120, 1),
(31, 1, 1, 1, 1, 9, '2021-03-01 17:51:39', NULL, 140, 20, 1, 120, 120, 1),
(32, 1, 1, 1, 1, 9, '2021-03-01 17:53:00', NULL, 300, 60, 1, 240, 240, 1),
(33, 2, 1, 1, 1, 9, '2021-03-01 17:57:26', NULL, 500, 320, 1, 180, 180, 1),
(34, 1, 1, 1, 1, 9, '2021-03-07 18:54:11', NULL, 500, 500, 1, 0, 0, 1),
(35, 1, 1, 1, 1, 9, '2021-03-07 19:02:09', NULL, 400, 400, 1, 0, 0, 1),
(36, 1, 1, 1, 1, 9, '2021-03-28 10:33:45', NULL, 150, 20, 1, 130, 130, 1),
(37, 1, 1, 1, 1, 9, '2021-03-28 10:34:11', NULL, 150, 20, 1, 130, 130, 1),
(38, 1, 1, 1, 1, 9, '2021-03-28 10:40:13', NULL, 80, 20, 1, 60, 60, 1),
(39, 1, 1, 1, 1, 9, '2021-03-28 10:44:05', NULL, 100, 40, 1, 60, 60, 1),
(40, 1, 1, 1, 1, 9, '2021-03-28 11:42:13', NULL, 500, 440, 1, 60, 60, 1),
(41, 1, 1, 1, 2, 9, '2021-03-28 11:51:50', NULL, NULL, NULL, 1, 60, 60, 1),
(42, 1, 1, 1, 2, 9, '2021-03-28 11:52:57', NULL, NULL, NULL, 1, 60, 60, 1),
(43, 1, 1, 1, 2, 9, '2021-03-28 11:53:46', NULL, NULL, NULL, 1, 60, 60, 1),
(44, 1, 1, 1, 2, 9, '2021-03-28 11:55:29', NULL, NULL, NULL, 1, 60, 60, 1),
(45, 1, 1, 1, 2, 9, '2021-03-28 11:58:24', NULL, NULL, NULL, 1, 60, 60, 1),
(46, 1, 2, 1, 2, 9, '2021-03-28 11:59:15', NULL, NULL, NULL, 1, 60, 60, 1),
(47, 1, 2, 1, 2, 9, '2021-03-28 12:00:18', NULL, NULL, NULL, 1, 210, 210, 1),
(48, 1, 2, 1, 2, 9, '2021-03-28 12:00:37', NULL, NULL, NULL, 1, 120, 120, 1),
(49, 1, 2, 1, 2, 9, '2021-03-28 12:17:46', NULL, NULL, NULL, 1, 60, 60, 1),
(50, 1, 2, 1, 2, 9, '2021-05-18 18:48:16', NULL, NULL, NULL, 1, 60, 60, 1),
(51, 1, 2, 1, 2, 9, '2021-05-18 18:54:21', NULL, NULL, NULL, 1, 60, 60, 1),
(52, 1, 2, 1, 2, 9, '2021-05-18 18:57:25', NULL, NULL, NULL, 1, 60, 60, 1),
(53, 1, 2, 1, 2, 9, '2021-05-18 18:59:09', NULL, NULL, NULL, 1, 60, 60, 1),
(54, 1, 2, 1, 2, 9, '2021-05-18 19:00:21', NULL, NULL, NULL, 1, 60, 60, 1),
(55, 1, 2, 1, 2, 9, '2021-05-18 19:02:11', NULL, NULL, NULL, 1, 60, 60, 1),
(56, 1, 2, 1, 2, 9, '2021-05-18 19:03:18', NULL, NULL, NULL, 1, 60, 60, 1),
(57, 1, 2, 1, 2, 9, '2021-05-18 19:05:55', NULL, NULL, NULL, 1, 60, 60, 1),
(58, 1, 2, 1, 2, 9, '2021-05-18 19:08:46', NULL, NULL, NULL, 1, 60, 60, 1),
(59, 1, 2, 1, 2, 9, '2021-05-18 19:10:00', NULL, NULL, NULL, 1, 60, 60, 1),
(60, 1, 2, 1, 2, 9, '2021-05-18 19:10:52', NULL, NULL, NULL, 1, 60, 60, 1),
(61, 1, 2, 1, 2, 9, '2021-05-18 19:11:39', NULL, NULL, NULL, 1, 60, 60, 1),
(62, 1, 1, 1, 1, 9, '2021-05-20 18:05:56', NULL, 200, 80, 1, 120, 120, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD CONSTRAINT `fk_cajas_sucursales` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id`);

--
-- Filtros para la tabla `cuentas_x_cobrar`
--
ALTER TABLE `cuentas_x_cobrar`
  ADD CONSTRAINT `cxc_ventas` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `fk_detalle_ventas` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`),
  ADD CONSTRAINT `fk_productos_ventas` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `movimientos_stock`
--
ALTER TABLE `movimientos_stock`
  ADD CONSTRAINT `fk_movimientos_productos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `fk_movimientos_sucursales` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id`);

--
-- Filtros para la tabla `permisos_sucursales`
--
ALTER TABLE `permisos_sucursales`
  ADD CONSTRAINT `fk_permisos_sucursales_sucursales` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id`),
  ADD CONSTRAINT `fk_permisos_sucursales_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_productos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `fk_stock_sucursales` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_ventas_sucursales` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id`),
  ADD CONSTRAINT `fk_ventas_tipos_pago` FOREIGN KEY (`id_tipo_pago`) REFERENCES `tipos_pago` (`id`),
  ADD CONSTRAINT `fk_ventas_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
