# Ares Fetch

Ares Fetch is a simple PHP tool to fetch data from the Czech company register Ares. It is a simple wrapper around the
Ares API which makes
it easier to fetch data from the API and handle response.

Right now it supports only searching by Company ID. Possible extend by other search requests.

## Pre-requisites

Lib requires PSR-7 compatible HTTP client. You can use any client you want. For example Guzzle:

```bash
composer require guzzlehttp/guzzle
```

## Usage

```php
//initialize lib
$aresFetch = new AresFetch();

//search by Company ID
$search = new \AresFetch\Request\SearchByCompanyId('01569651'); //possible different search requests
$result = $aresFetch->request($search);

if ($result->isSuccess()) {
    $companies = $result->getResults();
    var_dump($companies);   //array of Company
}
```

Or the same results in the short form:

```php
$aresFetch = new AresFetch();
$result = $aresFetch->searchByCompanyId('01569651');
var_dump($result->getCompany());   //null or Company
```
