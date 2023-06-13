<?php
/*
 * This file is part of the TYPO3 project.
 * (c) 2022 B-Factor GmbH / 12bis3 / Sudhaus7 / code711.de
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 * The TYPO3 project - inspiring people to share!
 *
 * @copyright 2022 B-Factor GmbH / 12bis3 / Sudhaus7 / https://code711.de/
 */
namespace Sudhaus7\Ticketform\Controller;
use Psr\Http\Message\ResponseInterface;
use Sudhaus7\Ticketform\Domain\Model\FormdataDTO;
use Sudhaus7\Ticketform\Services\TicketSystemFactory;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
class TicketController extends ActionController
{
    public function indexAction(?FormdataDTO $formdata = null): ResponseInterface
    {
        if ($formdata === null) {
            $formdata = new FormdataDTO();
        }
        $ticketsystem = TicketSystemFactory::getDriver();
        $this->view->assign('categories', $ticketsystem->getCategories());
        $this->view->assign('config', GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('ticketform'));
        $this->view->assign('formdata', $formdata);
        return $this->htmlResponse($this->view->render());
    }

    public function saveAction(FormdataDTO $formdata): ResponseInterface
    {
        /*print_r($formdata);*/
        $ticketsystem = TicketSystemFactory::getDriver();
        $issue_id = $ticketsystem->generateTicket($formdata);
        if($issue_id !==null)
        {
            $this->view->assign('id', $issue_id);
            return $this->htmlResponse($this->view->render());
        }else{
            return $this->redirect('index', null, null, ['formdata'=>$formdata]);
        }
        exit;
        // FEHLER !
        return $this->forwardToReferringRequest();
        return $this->redirect('index', null, null, ['formdata'=>$formdata]);
        return $this->htmlResponse($this->view->render());
    }
}
