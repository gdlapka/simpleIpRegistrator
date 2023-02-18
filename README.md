
# simpleIpRegistrator

Простой одностраничник для регистрации информации о посетителях на Yii2.

Предназначен в основном для тестирования прокси сервисов.

### Сборка

##### Настройка БД

Для минимальной настройки требуется создать sqlite.db в папке проекта:  

```
touch sqlite.db
```

Для работы с другими БД требуется перенастроить config/db.php, взяв за основу db.php.install  

```
cp config/db.php.install config/db.php
```

##### Установка компрессоров

```
npm i terser -g
npm i yuicompressor@2.4.7 -g
```

##### Сжатие наборов ресурсов

```
php yii asset config/assets.php config/assets_compressed.php
```
