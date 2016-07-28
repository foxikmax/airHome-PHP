# airHome-PHP

# Описание

Консоль управления кондиционером в локальной сети через Broadlink RM Mini 3. Написана на php + bootstrap 3 + jquery.


# Возможности

* Включение/выключение кондиционера
* Изменение температуры
* Изменение положения шторки
* Изменение скорости вращения вентилятора
* Быстрое охлаждение
* Расписание запуска/остановки
* Выставлять таймер (встроенный)

# Начало использования

* Необходимо установить зависимости composer. 

```
cd /var/www/homeAir/include
composer install
```

* Отредактировать константы DIR, DIR_INC, CONFILE, URL в файле include/config.php

* Изменить значения IP и Port в соответствии со своими значениями в файле install.php
Запустить файл install.php

```
php /var/www/homeAir/install.php
```

* Удалить файл install.php

* К папке include желательно ограничить доступ.

* Для работы расписания необходимо добавить daemon.php в Cron

```
*/3 * * * *  php /var/www/air/include/daemon.php > /dev/null 2>&1
```

# Скриншот

![alt tag](https://cloud.githubusercontent.com/assets/3891799/17212675/51b9c7da-54d9-11e6-9832-8c67d8003e1e.png) 

