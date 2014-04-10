<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows users to create scoreboards on the fly. The scoreboard id is returned 
 * by the method if the scoreboard is successfully created, allowing for further interactions 
 * through the API.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=293
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Scoreboard_Create implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_scoreboardtype = NULL;

    
    /**
     * The event code for the event which is to be ended. Each CiL event that is created is 
     * assigned a unique event code that identifies it in the database - The event owner can 
     * find this value after creating a new event, by selecting the "altcast_code" which 
     * is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list and event/create API methods.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Scoreboard_Create
     */
    public function setEventCode(string $code)
    {
        $this->_eventcode = $code;
        return $this;
    }
    
    /**
     * Indicates the type of scoreboard that is being created. Depending of this value, 
     * the additional request parameters will differ. These are listed below. 
     * Possible values for scoreboard_type include:
     * 
     * baseball - a baseball specific scoreboard
     * basketball - a basketball specific scoreboard
     * collegebasketball - a college basketball specific scoreboard (halves instead of quarters)
     * football - a football specific scoreboard
     * hockey - a hockey specific scoreboard
     * soccer - a soccer specific scoreboard
     * standings - a scoreboard of the "Race/Standings" type
     * 
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Scoreboard_Create
     */
    public function setScoreBoard(string $value)
    {
        $this->_scoreboardtype = $value;
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
                'scoreboard_type' => $this->_scoreboardtype
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
                'endpointurl' => '/scoreboard/create',
                'method' => 'post'
        );
    }
} 