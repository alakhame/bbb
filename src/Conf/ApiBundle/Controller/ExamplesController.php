<?php

namespace Conf\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use	Conf\ApiBundle\Entity\BigBlueButton;

class ExamplesController extends Controller

{
	public function joinMAction(){

		$bbb = new BigBlueButton();
		
				$joinParams = array(
			'meetingId' => '1234', 				// REQUIRED - We have to know which meeting to join.
			'username' => 'Test Moderator',		// REQUIRED - The user display name that will show in the BBB meeting.
			'password' => 'mp',					// REQUIRED - Must match either attendee or moderator pass for meeting.
			'createTime' => '',					// OPTIONAL - string
			'userId' => '',						// OPTIONAL - string
			'webVoiceConf' => ''				// OPTIONAL - string
		);

		// Get the URL to join meeting:
		$itsAllGood = true;
		try {$result = $bbb->getJoinMeetingURL($joinParams);}
			catch (Exception $e) {
				echo 'Caught exception: ', $e->getMessage(), "\n";
				$itsAllGood = false;
			}

		if ($itsAllGood == true) {
			//Output results to see what we're getting:
			print_r($result);
		}
	}


	public function createAction()
    {
		$bbb = new BigBlueButton();

		/* ___________ CREATE MEETING w/ OPTIONS ______ */
		/* 
		*/
		$creationParams = array(
			'meetingId' => '1234', 					// REQUIRED
			'meetingName' => 'Test Meeting Name', 	// REQUIRED
			'attendeePw' => 'ap', 					// Match this value in getJoinMeetingURL() to join as attendee.
			'moderatorPw' => 'mp', 					// Match this value in getJoinMeetingURL() to join as moderator.
			'welcomeMsg' => '', 					// ''= use default. Change to customize.
			'dialNumber' => '', 					// The main number to call into. Optional.
			'voiceBridge' => '', 					// PIN to join voice. Optional.
			'webVoice' => '', 						// Alphanumeric to join voice. Optional.
			'logoutUrl' => '', 						// Default in bigbluebutton.properties. Optional.
			'maxParticipants' => '-1', 				// Optional. -1 = unlimitted. Not supported in BBB. [number]
			'record' => 'false', 					// New. 'true' will tell BBB to record the meeting.
			'duration' => '0', 						// Default = 0 which means no set duration in minutes. [number]
			//'meta_category' => '', 				// Use to pass additional info to BBB server. See API docs.
		);

		// Create the meeting and get back a response:
		$itsAllGood = true;
		try {$result = $bbb->createMeetingWithXmlResponseArray($creationParams);}
			catch (Exception $e) {
				return new Response('Caught exception: ', $e->getMessage(), "\n");
				$itsAllGood = false;
			}

		if ($itsAllGood == true) {
			// If it's all good, then we've interfaced with our BBB php api OK:
			if ($result == null) {
				// If we get a null response, then we're not getting any XML back from BBB.
				return new Response("Failed to get any response. Maybe we can't contact the BBB server.");
			}	
			else { 
			// We got an XML response, so let's see what it says:
			print_r($result);
				if ($result['returncode'] == 'SUCCESS') {
					// Then do stuff ...
					return new Response( "<p>Meeting succesfullly created.</p>" );
				}
				else {
					return new Response( "<p>Meeting creation failed.</p>");
				}
			}
		}



    }
}
