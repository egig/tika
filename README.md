Tika
====

[![Build Status](https://travis-ci.org/egig/tika.svg)](https://travis-ci.org/egig/tika)

Tika is short of "Ketika" means "When". Tika is small library extends well-known datetime library `Carbon\Carbon` allows you to use localize months and days name directly for your application.

Example:

```php
<?php
	$date = new Tika('first day of October 2014', 'Asia/Jakarta');
	$date->setLocale('id');
	echo $date->format('l');
?>
```

You will get output: 'Rabu' means 'Wednesday' which is First Day of October 2014 on Asia/Jakarta TimeZone;