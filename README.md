zf-coveritlive
==============

ZF-CoveritLive a simple Client library for Zendramework




Installation:
=============

Copy the folder "CoveritLive" into the  directory "library/ZendX".




Examples
========


return a CoveritLive Event:
<pre><code>
$httpclient = new Zend_Http_Client();
$endpoint = new ZendX_CoveritLive_Endpoints_Event_Data();
$endpoint->setEventCode(COVERITLIVE EVENTCODE);

$coveritlive = new ZendX_CoveritLive_Api();
$coveritlive->setAccessToken(YOUR ACCESSTOKEN)
		->setEndpoint($endpoint)
		->setHttpClient($httpclient)
		->connect();
</code></pre>



return a template list:
<pre><code>
$httpclient = new Zend_Http_Client();
$endpoint = new ZendX_CoveritLive_Endpoints_Template_List();

$coveritlive = new ZendX_CoveritLive_Api();
$coveritlive->setAccessToken(YOUR ACCESSTOKEN)
		->setEndpoint($endpoint)
		->setHttpClient($httpclient)
		->connect();
</code></pre>