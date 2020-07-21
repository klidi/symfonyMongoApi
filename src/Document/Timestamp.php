<?php
/**
 * Created by IntelliJ IDEA.
 * User: iraklid
 * Date: 18.7.20
 * Time: 11:44 PM
 */

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @ODM\EmbeddedDocument
 */
class Timestamp
{
    /**
     * @ODM\Field(type="date")
     */
    private $createdAt;

    /**
     * @ODM\Field(type="date")
     */
    private $updatedAt;

    /**
     * @ODM\Field(type="date")
     */
    private $deletedAt;

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt) : void
    {
        $this->updatedAt = $updatedAt;
    }
}