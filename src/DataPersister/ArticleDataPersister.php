<?php
/**
 * Created by IntelliJ IDEA.
 * User: iraklid
 * Date: 19.7.20
 * Time: 11:32 PM
 */

namespace App\DataPersister;

use App\Document\Article;
use App\DataPersister\Traits\DataPersisterTrait;
use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use Doctrine\ODM\MongoDB\DocumentManager;

final class ArticleDataPersister  implements ContextAwareDataPersisterInterface
{
    use DataPersisterTrait;

    private $documentManager;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Article;
    }

    public function persist($data, array $context = [])
    {
        $this->setTimestamp($data);
        $this->documentManager->persist($data);
        $this->documentManager->flush();
        return $data;
    }

    public function remove($data, array $context = [])
    {
        // if i had time to implement soft deletes , the deletedAt would be set here.
    }
}
