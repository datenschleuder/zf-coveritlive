<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows a comment that has been submitted to an event to be published. 
 * Comments from any source can be published, including regular comments submitted 
 * through the viewer window, comments submitted through the API and by email.  
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=316
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Comment_Publish implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_commentid = NULL;
 
    
    /**
     * The event code for the event which the comments will be added to. 
     * Each CiL event that is created is assigned a unique event code 
     * that identifies it in the database - The event owner can find this 
     * value after creating a new event, by selecting the "altcast_code" 
     * which is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list API method.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Comment_Publish
     */
    public function setEventCode($code)
    {
        $this->_eventcode = (string) $code;
        return $this;
    }
    
    
    /**
     * The id of the comment to be published.
     * 
     * @param string $commentid
     * @return ZendX_CoveritLive_Endpoints_Comment_Publish
     */
    public function setCommentId($commentid)
    {
        $this->_commentid = (string) $commentid;
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
                'comment_id' => $this->_commentid
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
                'endpointurl' => '/comment/publish',
                'method' => 'post'
        );
    }
} 