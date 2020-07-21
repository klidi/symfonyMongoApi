<?php
/**
 * Created by IntelliJ IDEA.
 * User: iraklid
 * Date: 17.7.20
 * Time: 3:26 PM
 */

namespace App\Document;

use App\Document\Timestamp;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={
 *         "get",
 *         "post"
 *     },
 *     itemOperations={
 *         "get",
 *         "delete"={"security"="is_granted('ROLE_USER')"},
 *         "put"={"security"="is_granted('ROLE_USER')"},
 *     }
 * )
 * @ODM\Document
 */
class Category
{
    /**
     * @ODM\Id(strategy="INCREMENT", type="integer")
     */
    private $id;

    /**
     * @ODM\Field(type="string")
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     */
    private $name;

    /**
     * @ODM\EmbedOne(targetDocument=TimeStamp::class)
     */
    private $timestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function getTimeStamp() : ? Timestamp
    {
        return $this->timestamp;
    }

    public function setTimeStamp(Timestamp $timestamp) : void
    {
        $this->timestamp = $timestamp;
    }
}
