<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

//caminho das entidades
$paths = [
    __DIR__ . '/Entity'
];

$isDevMode = true;

//informacoes de conexao
$dbParams = [
    'driver' => 'pdo_mysql',
    'user' => 'fabio',
    'password' => 'fabio123',
    'dbname' => 'doctrine'
];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

function getEntityManager()
{
    global $entityManager;
    return $entityManager;
}