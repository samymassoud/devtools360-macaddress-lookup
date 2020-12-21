# 🔍 Macaddress Vendor Lookup

Using this package you can lookup for vendor/company from mac address prefix.<br/>
The package will search through the XML file of vendorMacs.xml for the company name.

## How to use
* Download the [Cisco vendorMacs.xml](https://devtools360.com/en/macaddress/vendorMacs.xml) file from DevTools360.com.
* Install the package using the following command `composer require devtools360/macaddresslookup`
* You can now initialize & use the package as follows

```
<?php
    require_once __DIR__ . '/vendor/autoload.php';
    use \Devtools360\MacAddressLookup;
    $file_path ="REPLACE THIS WITH THE XML FILE PATH";
    $mac = new MacAddressLookup($file_path);
    echo $mac->lookup("FC:FE:77");
?>
```

## How to use with Laravel
This package will work out of the box with Laravel framework, just follow the above steps for installing the package, and to use it in any class just add the following namespace.<br/>
`use \Devtools360\MacAddressLookup;`<br/>
Then you can initiate the class or use the dependency injection of Laravel to initiate it for you.

## Set the path seprately
If this package was used with Laravel dependency injection it will not set the path for you, so you can easily call setFilePath to do the same as follows.
```
$mac = new MacAddressLookup();
$mac->setFilePath("FILE PATH HERE");
```
## Issue or suggestion
Please feel free to open a bug report or pull request to this repo.

## Thanks to
The website [DevTools360](https://devtools360.com/) for providing the updated cisco vendorMacs.xml file.<br/>
Please check the awesome tools such as [Macaddress Lookup](https://devtools360.com/en/macaddress/lookup) and [QR code generator](https://devtools360.com/en/qr/generator) from the same site.