<?php
/**
 * ZF-CoveritLive - A simple CoveritLive Client for Zendframework
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @license    MIT
 */
final class ZendX_CoveritLive_Api
{

    private $_httpclient = NULL;

    private $_endpoint = NULL;

    private $_accesstoken = NULL;

    /**
     * set http client
     *
     * @param Zend_Http_Client $client            
     * @return ZendX_CoveritLive_Api
     */
    public function setHttpClient (Zend_Http_Client $client)
    {
        $this->_httpclient = (object) $client;
        return $this;
    }

    /**
     * set access token
     *
     * @param string $accesstoken            
     * @return ZendX_CoveritLive_Api
     */
    public function setAccessToken ($accesstoken)
    {
        $this->_accesstoken = (string) $accesstoken;
        return $this;
    }

    /**
     * set coveritlive endpoint
     *
     * @param object $endpoint            
     * @return ZendX_CoveritLive_Api
     */
    public function setEndpoint ($endpoint)
    {
        $this->_endpoint = (object) $endpoint;
        return $this;
    }

    /**
     * connecting to coveritlive api
     *
     * @return void
     */
    public function connect ()
    {
        $httpclient = $this->_httpclient;
        $endpointurl = $this->_endpoint->getUrl();
        
        $httpclient->setUri('https://api.coveritlive.com/remote/2'.$endpointurl['endpointurl']);
        $httpclient->setParameterGet('token', $this->_accesstoken);
        
        $this->_setParams();
        return Zend_Json::decode(
                $httpclient->request(
                        '' . strtoupper($endpointurl['method']) . '')->getBody());
    }

    /**
     * read and set params from coveritlive endpoint
     *
     * @return void
     */
    private function _setParams ()
    {
        $endpoint = $this->_endpoint->getData();
        if (count($endpoint) > 0) {
            
            $method = $this->_endpoint->getUrl();
            $methodname = 'setParameter' . ucfirst($method['method']);
            
            foreach ($endpoint as $param => $value) {
                $this->_httpclient->{$methodname}($param, $value);
            }
        }
    }
}