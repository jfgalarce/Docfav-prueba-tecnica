<?php

require_once 'vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

$config = ORMSetup::createAttributeMetadataConfiguration(
  paths: [__DIR__ . '/src'],
  isDevMode: true,
);

$connection = DriverManager::getConnection([
  'driver' => 'pdo_mysql',
  'user' => 'myuser',
  'password' => 'mypassword',
  'dbname' => 'mydatabase',
], $config);

$entityManager = new EntityManager($connection, $config);
