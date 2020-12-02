## Currencywrapper

Laravel wrapper for [exchangeratesapi.io](https://exchangeratesapi.io/)

### Installing

Available via composer:

```
composer require tmsweane/currencywrapper
```

### Usage

```
php artisan serve

latest currency - GET http://127.0.0.1:8000/api/currency/latest?base=EUR&symbols=EUR,PLN
histroy currency - GET http://127.0.0.1:8000/api/currency/histroy?start_at=2020-09-01&end_at=2020-09-02&base=EUR&symbols=EUR,PLN
```



## Authors

- **Vladyslav Talasymov** - *Initial work* - [tmsweane](https://github.com/tmsweane)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
