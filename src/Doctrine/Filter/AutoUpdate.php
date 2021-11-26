<?php

namespace App\Doctrine\Filter;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

class AutoUpdate extends SQLFilter
{

    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {

        if ($targetEntity->hasField("updatedAt")) {
            $date = date("Y-m-d H:i:s");
            return $targetTableAlias . ".updated_at < '" . $date . "'";
        }

        return "";
    }
}
