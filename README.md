# AirHome

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


# Редактирование команд

Все команды содержаятся в массиве $commands в файле action.php

Для получения команды нужно запустить снифер на устройстве, через которое проходит трафик к Broadlink Mini, у меня это WiFi-роутер.

```
tcpdump -w /tmp/dump.cap host <ip устройства>
```

После чего не спеша выполнять команды на телефоне. Останавливает снифер. Открываем файл с пакетами. И видим следующее (примерно), главное, что бы destination был ip вашего Broadlink.

![alt tag](https://habrastorage.org/files/ed5/026/ec9/ed5026ec9a874e3dbe6d3df2d922727d.png) 

Копируем HEX данные. Правой кнопкой по полю Data -> Copy -> Bytes -> Hex stream

![alt tag](https://habrastorage.org/files/c99/db5/443/c99db544350d4791aec45d3cfa437353.png)

Строка должна начинаться с символов 5aa5aa555aa5aa55.

И копируем полученную строку в массив $commands в файле action.php

![alt tag](https://habrastorage.org/files/ea1/9f8/3cf/ea19f83cf40e482890a731cbb7872679.png)

# Скриншот

![alt tag](https://cloud.githubusercontent.com/assets/3891799/17212675/51b9c7da-54d9-11e6-9832-8c67d8003e1e.png) 

