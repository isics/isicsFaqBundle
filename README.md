IsicsFAQBundle
======================

This bundle provides a simple faq:

Installation
------------

## Step 1: Installation using the `bin/vendors.php` method

Add the following entries to the `deps` in the root of your project file:

```
[IsicsFAQBundle]
    git=https://github.com/isics/isicsFaqBundle.git
    target=bundles/Isics/FAQBundle
```

Next, update your vendors by running:

``` bash
$ ./bin/vendors
```

## Step2: Configure the autoloader


``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...

    'Isics'        => __DIR__.'/../vendor/isics',
));
```

## Step3: Enable the bundle

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...

        new Isics\FAQBundle\IsicsFAQBundle(),
    );
}
```

## Step4: Register the bundle's routes

``` yaml
# app/config/routing.yml

IsicsFAQBundle:
    resource: "@IsicsFAQBundle/Resources/config/routing.yml"
    prefix:   /faq
```
