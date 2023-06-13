<?php
namespace Acceptance;
use Redmine\Client\NativeCurlClient;
use Tests\Support\AcceptanceTester;
class WebsiteCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
    }
    public function WebsiteRuns(AcceptanceTester $I)
    {
        $I->see('Wir formen Ihren Erfolg.');
    }
    public function CreateTicket(AcceptanceTester $I)
    {
        $I->amOnPage('/kontakt');
        $I->see('Betreff');
        $subject = 'Anfrage' .time();
        /*tx_ticketform_ticketform[formdata][category]*/
        $I->submitForm('#issueform', [
            'tx_ticketform_ticketform'=>[
                'formdata'=>[
                    'category' => '1',
                    'name' => 'test',
                    'subject'=>$subject,
                    'email'=>'xxx@hotmail.de',
                    'message'=>'Test'
                ]
            ]
        ]);
        $I->see('Vielen Dank');
        $client = new NativeCurlClient('http://localhost:3080', '1a261bc22d7816b09a6c54c1e2a750d4b6b44ead');//Client for API access
        $issues = $client->getApi('issue')->all(['subject'=>$subject]);
        $I->assertEquals(1, $issues['total_count'], '1 issue generated');
        $I->assertEquals($subject, $issues['issues'][0]['subject'], "Our issue has been generated");
        $client->getApi('issue')->remove($issues['issues'][0]['id']);
    }
}
