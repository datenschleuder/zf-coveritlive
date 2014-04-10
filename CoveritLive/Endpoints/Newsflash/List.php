<?php

/**
 * ZF-CoveritLive
 * 
 * This method provides a list of newsflashes for an event. All newsflashes are returned, 
 * including those that have been deleted. All relevant data for each newsflash is returned.
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=289
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Newsflash_List implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_status = NULL;
    
    /**
     * A pipe (|) delimited list of newsflash types to retrieve. Possible values include:
     * 
     * published - newsflash has been created
     * deleted - newsflash has been removed from display
     * 
     * @param string $newsid
     * @return ZendX_CoveritLive_Endpoints_Newsflash_List
     */
    public function setStatus(string $value)
    {
        $this->_status = $value;
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
     * @return ZendX_CoveritLive_Endpoints_Newsflash_List
     */
    public function setEventCode(string $code)
    {
        $this->_eventcode = $code;
        return $this;
    }

    
    /**
     * return GET-Parameter
     * 
     * (non-PHPdoc)
     * @see ZendX_CoveritLive_Interfaces_Endpoint::getData()
     * @return array
     */
    public function getData ()
    {
        return array(
                'event_code' => $this->_eventcode,
                'status' => $this->_status
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
                'endpointurl' => '/newsflash/list',
                'method' => 'get'
        );
    }
} 