# Slim PHP CRUD

This CRUD Slim framework use project structure from [Slim Framework 3 skeleton](https://github.com/slimphp/Slim-Skeleton). 

Use this skeleton application to quickly setup and start working on a new Slim Framework 3 application. This application uses the latest Slim 3 with the PHP-View template renderer. It also uses the Monolog logger.

This skeleton application was built for Composer. This makes setting up a new Slim Framework application quick and easy.

## Install the Application

Run this command from the directory in which you want to install your new Slim Framework application.
```
composer create-project slim/slim-skeleton slimphp-CRUD
```

## Install Eloquent ORM

This application also use eloquent ORM from Laravel. The documentation is [here](https://www.slimframework.com/docs/cookbook/database-eloquent.html).
```
composer require illuminate/database "~5.1"
```

## Database

The application connect to MySQL database. The configuration of database added in setting and  dependencies file.

Database connection settings on 'src/settings.php'
```
'db' => [
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'example',
    'username' => 'root',
    'password' => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]
```

Service factory for the ORM on 'src/dependencies.php'
```
$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};
```

Also don't forget to initialize Eloquent on index.php file
Initialize Eloquent on 'public/index.php'
```
$app->getContainer()->get("db");
```

The database schema could be imported from example.sql. This app use database named 'example' and 'books' table which has 4 columns. 
```
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
```

## Model
Create 'models' folder on the root path and put schema file there. After that initialiaze model file path on index.php file.
Register model on 'public/index.php'
```
require '/../Models/Book.php';
```

## Route
Create 'routes' folder on the root path and put route file there. After that initialiaze route file path on index.php file.
Register routes by model on 'public/index.php'
```
require __DIR__ . '/../routes/books.php';
```