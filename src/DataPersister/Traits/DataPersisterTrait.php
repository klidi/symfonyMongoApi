<?php
/**
 * Created by IntelliJ IDEA.
 * User: iraklid
 * Date: 20.7.20
 * Time: 1:13 AM
 */

namespace App\DataPersister\Traits;

use App\Document\Timestamp;

/**
 * Trait DataPersisterTrait
 * more methods can be added , if it becomes bloated it can be separated
 * into more specific/specialized traits so we don't have
 * to load unnecessary methods in DataPersisters that use this trait\s
 */
trait DataPersisterTrait
{
    public function setTimestamp($data) : void
    {
        $timestamp = $data->getTimestamp() ? $data->getTimestamp() : new Timestamp();
        if ($timestamp->getCreatedAt() === null) {
            $timestamp->setCreatedAt(new \DateTime("now"));
        }
        $timestamp->setUpdatedAt(new \DateTime("now"));
        $data->setTimestamp($timestamp);
    }
}
