<?php
    function doSoapRequest($paramsXML)
    {
        /*$soap = new SoapClient("https://bms.gf.lt:443/ClientZoneWS/EshopService?wsdl", array('trace' => 1));*/
        $arrContextOptions=array("ssl"=>array( "verify_peer"=>false, "verify_peer_name"=>false,'crypto_method' => STREAM_CRYPTO_METHOD_TLS_CLIENT));

        $soap_options = array(
                'soap_version'=>SOAP_1_1,
                'exceptions'=>true,
                'trace'=>1,
                'cache_wsdl'=>WSDL_CACHE_NONE,
                'stream_context' => stream_context_create($arrContextOptions)
        );
            $soap = new SoapClient(Configuration::get('GENERALFINANCING_SOAP_CLIENT'), $soap_options);

        // TRYING REQUEST SOAP
        try {
            return $gf_result = $soap->__doRequest($paramsXML, Configuration::get('GENERALFINANCING_SOAP_REQ'), 'StartDealSession_v2', 0);
        } catch (Exception $e) {
            PrestaShopLogger::addLog($e->getMessage(), 1);
        }
    }