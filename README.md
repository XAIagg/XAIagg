# XAIagg Media Aggregator

XAIagg Media Aggregator: One Link, Infinite Connections - Share all your XAIagg media profiles in a single click!

## Tech Stack

**Backend:** PHP(CodeIgniter), MySQL, Javascript

**FrontEnd:** HTML, CSS(Tailwindcss)

### Requirements

- PHP 7 or Higher
- Composer
- MySQL

### Create tables

#### user

```bash
   CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(155) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_img` varchar(255) DEFAULT 'https://dummyimage.com/150x150',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
)
```

#### XAIaggs

```bash
  CREATE TABLE `XAIaggs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `twitter` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `tiktok` varchar(100) DEFAULT NULL,
  `userId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId_UNIQUE` (`userId`),
  CONSTRAINT `XAIaggs_user` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE
)
```

#### colors

```bash
   CREATE TABLE `colors` (
  `id` int NOT NULL,
  `bg_color` varchar(45) DEFAULT 'white',
  `txt_color` varchar(45) DEFAULT 'black',
  `acc_color` varchar(45) DEFAULT 'purple',
  `userId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId_UNIQUE` (`userId`),
  CONSTRAINT `colors_user` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE
)
```

### Setup .env

```
database.default.hostname = localhost
database.default.database = General
database.default.username = <your_mysql_username>
database.default.password = <your_mysql_password>
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = <your_mysql_port>
```

### Start the server

```bash
  php spark serve
```

