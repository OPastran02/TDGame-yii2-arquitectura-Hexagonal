<?php

declare(strict_types=1);

namespace api\Core\Chapter\Chapter\Infrastructure\Persistence\ActiveRecord;

use api\Core\Chapter\Chapter\Domain\Chapter;
use api\Core\Chapter\Chapter\Domain\Chapters;
use api\Core\Chapter\Chapter\Domain\Repository\IChapterRepository;
use common\models\Chapter as Model;

class ChapterRepositoryActiveRecord implements IChapterRepository
{
    public function getbyId(int $id): ?Chapter
    {
        $model = Model::findOne($id);
        if (!$model) return null;
        return Chapter::fromPrimitives(...$model["attributes"]);
    }
}
