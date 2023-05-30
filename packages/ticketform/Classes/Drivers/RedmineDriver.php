<?php

namespace Sudhaus7\Ticketform\Drivers;

use Doctrine\DBAL\Driver;
use Redmine\Client\NativeCurlClient;
use Sudhaus7\Ticketform\Domain\Model\FormdataDTO;
use Sudhaus7\Ticketform\Interfaces\DriverInterface;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class RedmineDriver implements DriverInterface
{
    public function getCategories(): array
    {
        $config = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('ticketform');
        if(empty($config['redmineurl']) || empty($config['apikey']) || empty($config['projectid']))
        {
            throw new \InvalidArgumentException('Extension not configured', 1685453959);
        }

        $client = new NativeCurlClient($config['redmineurl'], $config['apikey']);//Client for API access
        $categories = $client ->getApi('issue_category')->all($config['projectid']);//get all categories for the project kwm-website via API
        $returnValue = [];//declare empty array for categories
        //get key->value pair of categories and fill array with the pairs
        foreach ($categories['issue_categories'] as $elem){
            $returnValue[$elem['id']]=$elem['name'];
        }
        /*print_r($returnValue);
        exit;
         return $categories;*/
        return $returnValue;//return


    }

    public function generateTicket(FormdataDTO $dto): int|string|null
    {
        $config = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('ticketform');
        if(empty($config['redmineurl']) || empty($config['apikey']) ||empty($config['projectid']))
        {
            throw new \InvalidArgumentException('Extension not configured', 1685453960);
        }

        $client = new NativeCurlClient($config['redmineurl'], $config['apikey']);//Client for API access
        $result = $client->getApi('issue')->create([
            'project_id' => $config['projectid'],
            'subject' => $dto->getSubject(),
            'description'=>$dto->getMessage()."\n name: ".$dto->getName()."\n email: ".$dto->getEmail(),
            'category_id'=>$dto->getCategory(),

        ]);
        return $result->id ? $result->id : null;


    }

}
