<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows users to update currently existing scoreboards. 
 * All elements of the scoreboard can be updated.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=295
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Scoreboard_Update implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_scoreboardtype = NULL;
    
    private $_headline = NULL;
    
    private $_scoreboardid = NULL;

    /**
     * The id of the scoreboard to be updated. Returned by the scoreboard/list and 
     * scoreboard/create API methods.
     * 
     * @param int $boardid
     * @return ZendX_CoveritLive_Endpoints_Scoreboard_Update
     */
    public function setScoreBoardId(int $boardid)
    {
        $this->_scoreboardid = $boardid;
        return $this;        
    }
    

    /**
     * The headline text of the scoreboard. May not be more than 120 characters in length for 
     * standings scoreboards, or more than 60 characters in length for team scoreboards. 
     * Headline is not displayed in the sport specific scoreboards.
     * 
     * @param string $headline
     * @return ZendX_CoveritLive_Endpoints_Scoreboard_Update
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
     * @return ZendX_CoveritLive_Endpoints_Scoreboard_Update
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
     * @return ZendX_CoveritLive_Endpoints_Scoreboard_Update
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
                'scoreboard_type' => $this->_scoreboardtype,
                'headline' => $this->_headline,
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
                'endpointurl' => '/scoreboard/update',
                'method' => 'post'
        );
    }
} 