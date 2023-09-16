<?php

declare(strict_types=1);

namespace api\Core\AvailableHeroes\Infrastructure\Persistence;

use api\Core\AvailableHeroes\Domain\AvailableHero;
use api\Core\AvailableHeroes\Domain\AvailableHeroes;
use api\Core\AvailableHeroes\Domain\Repository\IAvailableHeroRepository;
use common\models\availablehero as AvailableHeroModel;
use api\Core\AvailableHeroes\Infrastructure\Persistence\AvailableHeroMapper;    

use api\Core\AvailableHeroes\Domain\ValueObjects\AvailableHeroName;
use api\Core\AvailableHeroes\Domain\ValueObjects\AvailableHeroDescription;
use api\Core\AvailableHeroes\Domain\ValueObjects\AvailableHeroWorld;
use api\Core\AvailableHeroes\Domain\ValueObjects\AvailableHeroId;
use api\Shared\Domain\ValueObject\Avatar;
use api\Shared\Domain\ValueObject\FkId;
use api\Shared\Domain\ValueObject\Stats;
use api\Shared\Domain\ValueObject\Boost;
use api\Shared\Domain\ValueObject\UUID;


use Yii;
use DateTime;

class AvailableHeroRepositoryACtiveRecord implements IAvailableHeroRepository
{
    public function getbyId(int $id): ?AvailableHero
    {
        $model = AvailableHeroModel::findOne($id);
        
        if (!$model) {
            return null;
        }else{
            return AvailableHero::fromPrimitives(...$model["attributes"]);
        }
        
    }

    public function getByrarity(int $rarity): AvailableHeroes
    {
        $availableHeroes = AvailableHeroModel::findAll(['rarity_id' => $rarity]);
        return new AvailableHeroes($availableHeroes);
    }

    public function delete(int $id): void
    {
        $availableHero = $this->getById($id); // Obtener el AvailableHero a través de la lógica del dominio
        if ($availableHero) {
            $availableHeroModel = AvailableHeroMapper::toModel($availableHero);
            if ($availableHeroModel->validate()) {
                $deleted = $availableHeroModel->delete();
            }
        }
    }

    public function save(AvailableHero $availableHero): ?int
    {
        $model = AvailableHeroMapper::toModel($availableHero);
        if ($model->save()) {
            return $model->getPrimaryKey(); // Aquí obtienes el ID generado
        }
    }

    public function update(AvailableHero $availableHero): ?int
    {
        $model = AvailableHeroMapper::toModel($availableHero);
        if ($model->update()) {
            return $model->getPrimaryKey(); // Aquí obtienes el ID generado
        }else{
            return 0;
        }
    }
}
