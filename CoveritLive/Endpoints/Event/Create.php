<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows users to create CoveritLive events on the fly. Events can be created simply 
 * by specifying just a title and start date / time, or additional parameters can be included for 
 * finer-grained control of the event particulars. This method returns the event code if the 
 * event is successfully created, allowing for further interactions through the API.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=282
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Event_Create implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_title = NULL;
    
    private $_isticker = NULL;
    
    private $_category = NULL;
    
    private $_startdate = NULL;
    
    private $_starttime = NULL;
    
    private $_timezone = 1;

    private $_location = NULL;
 
    private $_isprivate = NULL;
    
    private $_templateid = NULL;
    
    private $_tweetmsg = NULL;
    
    private $_enabletitlepage = NULL;
    
    private $_enableemailcomments = NULL;
    
    private $_enablerdrattachments = NULL;
    
    private $_showlivelistings = NULL;
    
    private $_allowrss = NULL;
    
    
    /**
     * The title of the event to be created. May not be > than 90 characters in length.
     * 
     * @param string $title
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function setTitle(string $title)
    {
        $this->_title = $title;
        return $this;
    }
    
    /**
     * Indicates whether the event to be created is a ticker. 
     * Set this parameter to 'y' to denote that the event is a ticker.
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function isTicker(string $value)
    {
        $this->_isticker = $value;
        return $this;
    }
    
    /**
     * Defines the general category of the event. Correctly categorizing your 
     * event makes it easier for Readers to find and potentially increases 
     * your live event traffic. Possible values include:
     * 
     * value    associated category
     * 
     * 18        Business
     * 11        Education
     * 20        Entertaiment
     * 22        Health
     * 24        Livestyle
     * 26        News
     * 5         Sports
     * 28        Technology
     * 
     * 
     * @param int $category
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function setCategory(int $category)
    {
        $this->_category = $category;
        return $this;
    }
    
    
    /**
     * The scheduled start date of the event, in the following format: YYYY-MM-DD
     * If no timezone is provided, this date defaults to the timezone provided in 
     * the user account which is denoted by the token parameter. For upcoming events 
     * that have a Title Page, this date (along with the scheduled start time) 
     * will be displayed to viewers.
     * 
     * @param string $startdate
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function setStartDate(string $startdate)
    {
        $this->_startdate = $startdate;
        return $this;
    }
    
    
    /**
     * The scheduled start time of the event, in 24 hour format: HH:MM
     * (24-hour format of an hour without leading zeros:minutes with leading zeros). 
     * MM must be one of 00, 15, 30, 45 (ie, only 15 minute start time increments are allowed).
     * 
     * @param string $starttime
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function setStartTime(string $starttime)
    {
        $this->_starttime = $starttime;
        return $this;
    }
    
    /**
     * timezone 	
     * The timezone that the event falls into, represented as a decimal number. The scheduled_startdate 
     * and scheduled_starttime parameters are assumed to be in this timezone. If not provided, it 
     * defaults to the timezone provided in the user account which is denoted by the token parameter.
     * 
     * @param int $value
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function setTimezone(int $value)
    {
        $this->_timezone = $value;
        return $this;
    }
    
    /**
     * The web address of the event. This address will be included in any shared Facebook and Twitter 
     * links, on event email invites, reader reminders and in the Live Now Listings. It's important 
     * to provide the correct public location as this address is used to drive traffic back to your live event.
     * 
     * @param string $location
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function setLocation(string $location)
    {
        $this->_location = $location;
        return $this;
    }
    
    
    /**
     * Indicate whether an event is private. Facebook and Twitter sharing is disabled for private events. 
     * Private events do not appear in the Live Now Listings, and the email reminder is hidden for 
     * Upcoming private events. The location request parameter is not required for private events.
     * 
     * Possible values: y/n
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function isPrivate(string $value)
    {
        $this->_isprivate = $value;
        return $this;
    }
    
    /**
     * Explicitly set the template that will be used for the viewer window for the event. 
     * The template id value can be retrieved using the template/list method. 
     * IF not specified, the template for the event is set to the default template for the user.
     * 
     * @param string $template
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function setTemplate(string $template)
    {
        $this->_templateid = $template;
        return $this;
    }
    
    /**
     * If the event to be created is not private, a tweet will be published to the CiLEvents 
     * Twitter account when the event is started. This tweet will contain the title and 
     * location of the event, as well as any additional text contained in the tweet_text parameter 
     * (space permitting). May not exceed 140 characters in length.
     * 
     * @param string $msg
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function setTweetMsg(string $msg)
    {
        $this->_tweetmsg = $msg;
        return $this;
    }
    
    /**
     * Indicate whether an event should have a title page. By default the Viewer Window includes a 
     * built in Title Page (also referred to as a "Veil"). The Title Page displays your event 
     * title, event status, and main image. It is particularly useful for displaying custom 
     * branding. Readers click the Title Page to view your live event. If disabled the 
     * Title Page will no longer appear for Live Events and Replays.
     * 
     * Possible values: y/n
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function setTitlePage(string $value)
    {
        $this->_enabletitlepage = $value;
        return $this;
    }
    
    /**
     * Allow your live event Readers to submit comments and images via email. 
     * All submitted items can be previewed from the Console. Defaults to disabled if not specified.
     * 
     * Possible values: y/n
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function setEmailComments(string $value)
    {
        $this->_enableemailcomments = $value;
        return $this;
    }
    
    /**
     * Allow your live event Readers to attach images to their comments. All submitted images 
     * can be previewed from your Console, and published at your discretion. This option is not 
     * available when Reader Comments have been turned off (check your template settings). 
     * Reader comments and attachments can also be managed from your Writer's Console. 
     * Defaults to enabled if not specified.
     * 
     * Possible values: y/n
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function setRdrAttachements(string $value)
    {
        $this->_enablerdrattachments = $value;
        return $this;
    }
    
    /**
     * If this parameter is set to 'y', your Live Event can be found and watched by any 
     * Reader browsing the CoveritLive "Live Now" Listings. Private events do not appear 
     * in Live Listings. If private request parameter is included and set to 'y', 
     * the show_live_listings parameter is ignored.
     * 
     * Possible values: y/n
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function setLiveListings(string $value)
    {
        $this->_showlivelistings = $value;
        return $this;
    }
    
    /**
     * If this parameter is set to 'y', CoveritLive will provide three RSS feeds for 
     * your readers at the bottom of your Viewer Window.
     * 
     * Possible values: y/n
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_Create
     */
    public function setRSS(string $value)
    {
        $this->_allowrss = $value;
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
                'title' => $this->_title,
                'is_ticker' => $this->_isticker,
                'category' => $this->_category,
                'scheduled_startdate' => $this->_startdate,
                'scheduled_starttime' => $this->_starttime,
                'timezone' => $this->_timezone,
                'location' => $this->_location,
                'private' => $this->_isprivate,
                'template_id' => $this->_templateid,
                'tweet_txt' => $this->_tweetmsg,
                'enable_title_page' => $this->_enabletitlepage,
                'enable_email_comments' => $this->_enableemailcomments,
                'enable_rdr_attachments' => $this->_enablerdrattachments,
                'show_live_listings' => $this->_showlivelistings,
                'allow_rss' => $this->_allowrss
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
                'endpointurl' => '/event/create',
                'method' => 'post'
        );
    }
} 