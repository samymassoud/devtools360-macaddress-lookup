<?php

namespace Devtools360;

use Exception;
/**
 * @description PHP class to get the vendor name for mac address from the vendorMacs.xml file
 * provided by https://devtools360.com/en/macaddress/vendorMacs.xml
 * @author Samy Massoud
 * @since 2020-12-21
 * @github https://github.com/samymassoud/devtools360-macaddress-lookup
 */
class MacAddressLookup
{
    private $file_path; //The XML File Path

    /**
     * @description Construct the class using xml file path, or you can initiate it later
     * @param $file_path string
     */
    public function __construct($file_path = false)
    {
        if ($file_path) {
            if (!file_exists($file_path)) {
                throw new Exception('File path doesn\'t exist');
            }
            $this->file_path = $file_path;
        }
    }

    /**
     * @description tell the class about file path
     * @param $file_path full file path
     * @return bool
     */
    public function setFilePath($file_path)
    {
        if (file_exists($file_path)) {
            $this->file_path = $file_path;
            return true;
        }

        throw new Exception('File path doesn\'t exist');
    }

    /**
     * @description search for company using mac prefix
     * @param $prefix string with format cc:cc:cc
     * @return string
     */
    public function lookup($prefix)
    {
        $dom = new \DOMDocument;
        $dom->load($this->file_path);
        
        $xpath = new \DOMXPath($dom);
        $xpath->registerNamespace('x', 'http://www.cisco.com/server/spt'); //Must add the namespace to xpath as it is not standard xml namespace
        $company = $xpath->query('//x:VendorMapping[@mac_prefix="'.$prefix.'"]/@vendor_name')->item(0);
        
        if(!$company){
            return "";
        }

        return $company->textContent;
    }
}
