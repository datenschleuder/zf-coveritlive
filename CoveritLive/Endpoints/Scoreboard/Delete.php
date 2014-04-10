<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows for a scoreboard to be deleted. Deleted scoreboards will be 
 * removed from all consoles and viewer windows.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=294
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Scoreboard_Delete implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_scoreboardid = NULL;

    
    /**
     * The event code for the event which is to be ended. Each CiL event that is created is 
     * assigned a unique event code that identifies it in the database - The event owner can 
     * find this value after creating a new event, by selecting the "altcast_code" which 
     * is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list and event/create API methods.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Scoreboard_Delete
     */
    public function setEventCode(string $code)
    {
        $this->_eventcode = $code;
        return $this;
    }
    
    /**
     * The id of the scoreboard to be deleted. Returned by the scoreboard/list and 
     * scoreboard/create API methods.
     * 
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Scoreboard_Delete
     */
    public function setScoreBoardId(int $boardid)
    {
        $this->_scoreboardid = $boardid;
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
                'scoreboard_id' => $this->_scoreboardid
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
                'endpointurl' => '/scoreboard/delete',
                'method' => 'post'
        );
    }
} 