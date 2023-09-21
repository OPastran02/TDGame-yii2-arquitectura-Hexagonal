<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Infrastructure\Persistence\ActiveRecord;

use api\Core\Chapter\Instance\Domain\InstanceChapter;
use api\Core\Chapter\Instance\Domain\InstanceChapters;
use api\Core\Chapter\Instance\Domain\Repository\IInstanceChapterRepository;
use common\models\InstanceChapter as Model;

class InstanceChapterRepositoryActiveRecord implements IInstanceChapterRepository
{
    public function getbyId(int $id): ?InstanceChapter
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return InstanceChapter::fromPrimitives(...$model["attributes"]);
        }
    }
}
