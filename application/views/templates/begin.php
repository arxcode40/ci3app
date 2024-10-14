<?php defined('BASEPATH') OR exit('No direct script access allowed') ?>

<!doctype html>
<html data-bs-theme="light" lang="id">
<head>
	<meta charset="utf-8" />
	<meta content="initial-scale=1.0, width=device-width" name="viewport" />
	<meta content="ie=edge" http-equiv="X-UA-Compatible" />
	<meta content="light" name="color-scheme" />
	<meta content="#0d6efd" name="theme-color" />

	<link href="<?= base_url('favicon.ico') ?>" rel="apple-touch-icon">
	<link href="<?= base_url('favicon.ico') ?>" rel="icon shortcut" type="image/x-icon">
	<title><?= $title ?> | CRUD App</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet" />
	<link href="<?= base_url(array('assets', 'css', 'style.css')) ?>" rel="stylesheet" />
</head>
<body class="bg-body-secondary d-flex flex-column min-dvh-100">