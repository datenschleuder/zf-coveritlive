<?php

/**
 * ZF-CoveritLive
 * 
 * This method provides a list of comments submitted to a CoveritLive event. 
 * This includes all comments, including those that weren't published. 
 * It also includes comments from all sources, including those submitted by 
 * email or through the API 
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=313
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Comment_List implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_commentid = NULL;
    
    private $_commentcount = NULL;
    
    private $_source = NULL;
 
    
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
     * @return ZendX_CoveritLive_Endpoints_Comment_List
     */
    public function setEventCode($code)
    {
        $this->_eventcode = (string) $code;
        return $this;
    }
    
    
    /**
     * The comment ID at which you want to start receiving comments. The comment ID is unique 
     * and is provided in the data for any comment returned. If it's not included, it 
     * will default to the earliest possible comment item (up to the default comment_count limit).
     * 
     * @param string $commentid
     * @return ZendX_CoveritLive_Endpoints_Comment_List
     */
    public function setCommentId($commentid)
    {
        $this->_commentid = (string) $commentid;
        return $this;
    }
    
    
    /**
     * Controls the number of comments that are returned. If the comment_id parameter is also 
     * included in the request, the comment_count comments directly after the comment with 
     * comment_id will be returned. Set comment_count to a negative value to return the 
     * comment_count items directly before the comment with comment_id. If no value is 
     * provided, the last 500 matching comments will be returned. Set this to an integer less 
     * than 500 to limit the number of comments returned. If this value is set to an integer 
     * greater than 500, only the last 500 matching comments will be returned. 
     * 
     * @param int $count
     * @return ZendX_CoveritLive_Endpoints_Comment_List
     */
    public function setCommentCount($count)
    {
        $this->_commentcount = (int) $count;
        return $this;
    }
    
    /**
     * Where a comment originated. If parameter not included or left blank, comments from all sources will be returned. Possible values:
     *
     * native - typed by a person viewing the event
     *
     * api - Comment supplied by comment/create API method
     *
     * email - Comment submitted through email 
     * 
     * @param string $tag
     * @return ZendX_CoveritLive_Endpoints_Comment_List
     */
    public function setSource($source)
    {
        $this->_source = (string) $source;
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
                'comment_id' => $this->_commentid,
                'comment_count' => $this->_commentcount,
                'source' => $this->_source,
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
                'endpointurl' => '/comment/list',
                'method' => 'get'
        );
    }
} 