<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows for a newsflash to be deleted. Deleted newsflashes will be 
 * removed from all consoles and viewer windows.
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=291
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Newsflash_Delete implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_newsflashid = NULL;
    
    /**
     * The id of the newsflash to be deleted. Returned by the newsflash/list 
     * and newsflash/create API methods.
     * 
     * @param string $newsid
     * @return ZendX_CoveritLive_Endpoints_Newsflash_Delete
     */
    public function setNewsflashId(string $newsid)
    {
        $this->_newsflashid = $newsid;
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
     * @return ZendX_CoveritLive_Endpoints_Newsflash_Delete
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
                'newsflash_id' => $this->_newsflashid
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
                'endpointurl' => '/newsflash/delete',
                'method' => 'post'
        );
    }
} 