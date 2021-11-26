<?php

namespace App\Doctrine\Filter;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

class SoftDelete extends SQLFilter
{

    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {

        if ($targetEntity->hasField("deletedAt")) {
            $date = date("Y-m-d H:i:s");
            return $targetTableAlias . ".deleted_at IS NULL";
        }

        return "";
    }
}
