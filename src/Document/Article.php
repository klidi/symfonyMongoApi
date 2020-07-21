<?php
/**
 * Created by IntelliJ IDEA.
 * User: iraklid
 * Date: 17.7.20
 * Time: 3:30 PM
 */

namespace App\Document;

use App\Document\Timestamp;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Bridge\Doctrine\MongoDbOdm\Filter\SearchFilter;

/**
 * @ApiResource(
 *     collectionOperations={
 *         "get",
 *         "post"={"security"="is_granted('ROLE_USER')"}
 *     },
 *     itemOperations={
 *         "get",
 *         "delete"={"security"="is_granted('ROLE_USER')"},
 *         "put"={"security"="is_granted('ROLE_USER')"},
 *     }
 * )
 * @ApiFilter(SearchFilter::class, properties={"category": "exact", "title": "partial", "text": "partial"})
 * @ODM\Document
 * @ODM\Indexes({
 *   @ODM\Index(keys={"title"="asc"}),
 *   @ODM\Index(keys={"text"="asc"}),
 *   @ODM\Index(keys={"category"="asc"})
 * })
 */
class Article
{
    /**
     * @ODM\Id(strategy="INCREMENT", type="integer")
     * @Groups({"read"})
     */
    private $id;

    /**
     * @ODM\Field(type="string")
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ODM\Field(type="string")
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     */
    private $text;

    /**
     * @ODM\ReferenceOne(targetDocument=Category::class, inversedBy="articles", storeAs="id")
     * @Assert\NotBlank()
     * @Assert\Type(type="object")
     */
    private $category;

    /**
     * @ODM\EmbedOne(targetDocument=TimeStamp::class)
     */
    private $timestamp;

    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }
    public function getText() : string
    {
        return $this->text;
    }

    public function setText(string $text) : void
    {
        $this->text = $text;
    }

    public function getCategory() :object
    {
        return $this->category;
    }

    public function setCategory(object $category) : void
    {
        $this->category = $category;
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