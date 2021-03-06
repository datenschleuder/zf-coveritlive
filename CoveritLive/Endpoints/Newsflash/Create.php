<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows users to create newsflashes on the fly. 
 * The newsflash id is returned by the method if the newsflash is successfully 
 * created, allowing for further interactions through the API.
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=290
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Newsflash_Create implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_headline = NULL;
    
    private $_body = NULL;
    
    
    /**
     * The body text of the newsflash. May not be more than 450 characters in length.
     * 
     * @param string $body
     * @return ZendX_CoveritLive_Endpoints_Newsflash_Create
     */
    public function setBody(string $body)
    {
        $this->_body = $body;
        return $this;
    }
    
    
   /**
    * The headline text of the newsflash. May not be more than 120 characters in length.
    * 
    * @param string $headline
    * @return ZendX_CoveritLive_Endpoints_Newsflash_Create
    */
    public function setHeadline(string $headline)
    {
        $this->_headline = $headline;
        return $this;
    }
    

    /**
     * The event code for the event which is to be ended. Each CiL event that is created is 
     * assigned a unique event code that identifies it in the database - The event owner can 
     * find this value after creating a new event, by selecting the "altcast_code" which 
     * is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list and event/create API methods.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Newsflash_Create
     */
    public function setEventCode(string $code)
    {
        $this->_eventcode = $code;
        return $this;
    }

    
    /**
     * return POST-Parameter
     * 
     * (non-PHPdoc)
     * @see ZendX_CoveritLive_Interfaces_Endpoint::getData()
     * @return array
     */
    public function getData ()
    {
        return array(
                'event_code' => $this->_eventcode,
                'headline' => $this->_headline,
                'body' => $this->_body
        );
    }

    /**
     * return url params
     * 
     * (non-PHPdoc)
     * @see ZendX_CoveritLive_Interfaces_Endpoint::getUrl()
     * @return array
     */
    public function getUrl ()
    {
        return array(
                'endpointurl' => '/newsflash/create',
                'method' => 'post'
        );
    }
} 