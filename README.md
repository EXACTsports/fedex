# FedEx API Wrapper for Laravel 8+
Integrate FedEx web services with your Laravel 8 or higher app. Early iterations of this package will focus on FedEx Office services like printing.
### How To Use
This package requires that you have a FedEx [developer account](https://www.fedex.com/en-us/developer/web-services/office/process.html#develop), complete with approved API keys.

Assuming that you have received fully activated and approved API credential from FedEx, add the values to your projects .env file:

```dotenv
FEDEX_KEY=
FEDEX_ACCOUNT_NUMBER=
FEDEX_METER_NUMBER=
FEDEX_OFFICE_INTEGRATOR_ID=
FEDEX_CLIENT_PRODUCT_ID=
FEDEX_CLIENT_PRODUCT_VERSION=
```

Use your test credentials in your local and test environments, being careful only to use your live credentials on production systems.


### Linting and Testing

```shell script
composer test:unit # Runs PHPUnit
composer lint # Runs php-cs-fixer to fix your coding style
composer test # Runs lint and then test:unit 
```