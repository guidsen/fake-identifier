# ID Transformation with Lumen and Laravel 5.1

With this little package you are able to transform your internal id's to obfuscated integers.
The package is made on top of [jenssegers/optimus](https://github.com/jenssegers/optimus) and is similar to Hashids.  
If you use this library and use the traits that comes with it, you will be able to get a hashed identifier by using the `hashed_id` attribute. So `$model->hashed_id` will contain you hashed id.  
If you want to change the attribute name, you can have a look at the [usage](#usage) section.

## Installation
```
composer require guidsen/fake-identifier
```

## Setup

The hashing algorithm depends on 3 integers.
- A large prime number lower than `2147483647`
- The inverse prime so that `(PRIME * INVERSE) & MAXID == 1`
- A large random integer lower than `2147483647`

You can calculate a prime number yourself, or pick one from this [list](http://primes.utm.edu/lists/small/millions/).  
Once you have selected a prime number, you can use the included console command to calculated the inverse prime that is used for the decoding process and generate a random integer:

```
> php vendor/bin/optimus spark YOUR_PRIME

Prime: 1580030173
Inverse: 59260789
Random: 1163945558
```

Because the helpers depend on the container binding you will have to bind the instance to the container with the `optimus` key.
This will look like (fill in your the values you just generated):

```
$this->app->bind('optimus', function () {
    $optimus = new \Guidsen\FakeIdentifier\Optimus(15468539, 1296427827, 340274557);
    return $optimus;
});
```

## Usage

The library comes with two helper traits.  
**FakeIdentifier**: This trait should be used in your model. This will add a attribute containing the hashed id.  
**FakeIdentifierHelper**: This trait should be used in your controllers or base controller. It will contain a `encode` and `decode` method which could be usefull.

The attribute which will contain the hashed id, default to `hashed_id`. You can change this to your own favorite id by using the `setAttributeName` method on the Optimus instance in the container binding.

```
$optimus = new \Guidsen\FakeIdentifier\Optimus(15468539, 1296427827, 340274557);
$optimus->setAttributeName('my_hashed_id');
```
