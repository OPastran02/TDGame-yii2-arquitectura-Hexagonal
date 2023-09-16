<?php

declare(strict_types=1);

namespace api\Core\AvailableHeroes\Domain;

use api\core\AvailableHeroes\Domain\ValueObjects\AvailableHeroId;
use api\core\AvailableHeroes\Domain\ValueObjects\AvailableHeroName;
use api\core\AvailableHeroes\Domain\ValueObjects\AvailableHeroWorld;
use api\core\AvailableHeroes\Domain\ValueObjects\AvailableHeroDescription;
use api\Shared\Domain\ValueObject\Avatar;
use api\Shared\Domain\ValueObject\Boost;
use api\Shared\Domain\ValueObject\Stats;
use api\Shared\Domain\ValueObject\FkId;
use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\Aggregate\AggregateRoot;
use DateTime;


final class AvailableHero extends AggregateRoot
{
    public function __construct(
        private AvailableHeroId|null $id,
        private AvailableHeroName $name,
        private AvailableHeroDescription $description,
        private AvailableHeroWorld $world,
        private Avatar $avatar,
        private Avatar $avatarBlock,
        private FkId $race_id,
        private FkId $rarity_id,
        private FkId $nature_id,
        private FkId $type_id,
        private Stats $attack_min,
        private Stats $attack_max,
        private Boost $b_attack_min,
        private Boost $b_Battack_max,
        private Stats $defense_min,
        private Stats $defense_max,
        private Boost $b_defense_min,
        private Boost $b_defense_max,
        private Stats $hp_min,
        private Stats $hp_max,
        private Boost $b_hp_min,
        private Boost $b_hp_max,
        private Stats $sp_attack_min,
        private Stats $sp_attack_max,
        private Boost $b_sp_attack_min,
        private Boost $b_sp_attack_max,
        private Stats $sp_defense_min,
        private Stats $sp_defense_max,
        private Boost $b_sp_defense_min,
        private Boost $b_sp_defense_max,
        private Stats $speed_min,
        private Stats $speed_max,
        private Boost $b_speed_min,
        private Boost $b_speed_max,
        private Stats $farming_min,
        private Stats $farming_max,
        private Boost $b_farming_min,
        private Boost $b_farming_max,
        private Stats $steeling_min,
        private Stats $steeling_max,
        private Boost $b_steeling_min,
        private Boost $b_steeling_max,
        private Stats $wooding_min,
        private Stats $wooding_max,
        private Boost $b_wooding_min,
        private Boost $b_wooding_max,
        private int $available,
        private readonly DateTime|null $created_at,
        private readonly DateTime|null $updated_at,
        private readonly UUID|null $created_by,
        private readonly UUID|null $updated_by
    )
    {
    }

    public static function create( 
        AvailableHeroId|null $id,
        AvailableHeroName $name,
        AvailableHeroDescription $description,
        AvailableHeroWorld $world,
        Avatar $avatar,
        Avatar $avatarBlock,
        FkId $race_id,
        FkId $rarity_id,
        FkId $nature_id,
        FkId $type_id,
        Stats $attack_min,
        Stats $attack_max,
        Boost $b_attack_min,
        Boost $b_Battack_max,
        Stats $defense_min,
        Stats $defense_max,
        Boost $b_defense_min,
        Boost $b_defense_max,
        Stats $hp_min,
        Stats $hp_max,
        Boost $b_hp_min,
        Boost $b_hp_max,
        Stats $sp_attack_min,
        Stats $sp_attack_max,
        Boost $b_sp_attack_min,
        Boost $b_sp_attack_max,
        Stats $sp_defense_min,
        Stats $sp_defense_max,
        Boost $b_sp_defense_min,
        Boost $b_sp_defense_max,
        Stats $speed_min,
        Stats $speed_max,
        Boost $b_speed_min,
        Boost $b_speed_max,
        Stats $farming_min,
        Stats $farming_max,
        Boost $b_farming_min,
        Boost $b_farming_max,
        Stats $steeling_min,
        Stats $steeling_max,
        Boost $b_steeling_min,
        Boost $b_steeling_max,
        Stats $wooding_min,
        Stats $wooding_max,
        Boost $b_wooding_min,
        Boost $b_wooding_max,
        int $available,
        DateTime|null $created_at,
        DateTime|null $updated_at,
        UUID|null $created_by,
        UUID|null $updated_by
    ): self 
    {
        return $availableHero = new AvailableHero(
            $id,
            $name,
            $description,
            $world,
            $avatar,
            $avatarBlock,
            $race_id,
            $rarity_id,
            $nature_id,
            $type_id,
            $attack_min,
            $attack_max,
            $b_attack_min,
            $b_Battack_max,
            $defense_min,
            $defense_max,
            $b_defense_min,
            $b_defense_max,
            $hp_min,
            $hp_max,
            $b_hp_min,
            $b_hp_max,
            $sp_attack_min,
            $sp_attack_max,
            $b_sp_attack_min,
            $b_sp_attack_max,
            $sp_defense_min,
            $sp_defense_max,
            $b_sp_defense_min,
            $b_sp_defense_max,
            $speed_min,
            $speed_max,
            $b_speed_min,
            $b_speed_max,
            $farming_min,
            $farming_max,
            $b_farming_min,
            $b_farming_max,
            $steeling_min,
            $steeling_max,
            $b_steeling_min,
            $b_steeling_max,
            $wooding_min,
            $wooding_max,
            $b_wooding_min,
            $b_wooding_max,
            $available,
            $created_at,
            $updated_at,
            $created_by,
            $updated_by
        );
    }

    public static function fromPrimitives(
        ?int $id,
        string $name,
        string $description,
        string $world,
        string $avatar,
        string $avatarBlock,
        int $race_id,
        int $rarity_id,
        int $nature_id,
        int $type_id,
        int $attack_min,
        int $attack_max,
        int $b_attack_min,
        int $b_Battack_max,
        int $defense_min,
        int $defense_max,
        int $b_defense_min,
        int $b_defense_max,
        int $hp_min,
        int $hp_max,
        int $b_hp_min,
        int $b_hp_max,
        int $sp_attack_min,
        int $sp_attack_max,
        int $b_sp_attack_min,
        int $b_sp_attack_max,
        int $sp_defense_min,
        int $sp_defense_max,
        int $b_sp_defense_min,
        int $b_sp_defense_max,
        int $speed_min,
        int $speed_max,
        int $b_speed_min,
        int $b_speed_max,
        int $farming_min,
        int $farming_max,
        int $b_farming_min,
        int $b_farming_max,
        int $steeling_min,
        int $steeling_max,
        int $b_steeling_min,
        int $b_steeling_max,
        int $wooding_min,
        int $wooding_max,
        int $b_wooding_min,
        int $b_wooding_max,
        int $available,
        ?int $created_at,
        ?int $updated_at,
        ?string $created_by,
        ?string $updated_by,
    ): self
    {
        return new AvailableHero(
            isset($id) ? new AvailableHeroId($id):   null,
            new AvailableHeroName($name),
            new AvailableHeroDescription($description),
            new AvailableHeroWorld($world),
            new Avatar($avatar),
            new Avatar($avatarBlock),
            new FkId((int)$race_id),
            new FkId((int)$rarity_id),
            new FkId((int)$nature_id),
            new FkId((int)$type_id),
            new Stats((int)$attack_min),
            new Stats((int)$attack_max),
            new Boost((int)$b_attack_min),
            new Boost((int)$b_Battack_max),
            new Stats((int)$defense_min),
            new Stats((int)$defense_max),
            new Boost((int)$b_defense_min),
            new Boost((int)$b_defense_max),
            new Stats((int)$hp_min),
            new Stats((int)$hp_max),
            new Boost((int)$b_hp_min),
            new Boost((int)$b_hp_max),
            new Stats((int)$sp_attack_min),
            new Stats((int)$sp_attack_max),
            new Boost((int)$b_sp_attack_min),
            new Boost((int)$b_sp_attack_max),
            new Stats((int)$sp_defense_min),
            new Stats((int)$sp_defense_max),
            new Boost((int)$b_sp_defense_min),
            new Boost((int)$b_sp_defense_max),
            new Stats((int)$speed_min),
            new Stats((int)$speed_max),
            new Boost((int)$b_speed_min),
            new Boost((int)$b_speed_max),
            new Stats((int)$farming_min),
            new Stats((int)$farming_max),
            new Boost((int)$b_farming_min),
            new Boost((int)$b_farming_max),
            new Stats((int)$steeling_min),
            new Stats((int)$steeling_max),
            new Boost((int)$b_steeling_min),
            new Boost((int)$b_steeling_max),
            new Stats((int)$wooding_min),
            new Stats((int)$wooding_max),
            new Boost((int)$b_wooding_min),
            new Boost((int)$b_wooding_max),
            (int)$available,
            isset($created_at) ? new DateTime('@' . (int)$created_at):null,
            isset($updated_at) ? new DateTime('@' . (int)$updated_at):null,
            isset($created_by) ? new UUID($created_by):null,
            isset($updated_by) ? new UUID($updated_by):null,
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'name'                  =>          $this->name->value(),
            'description'           =>          $this->description->value(),
            'world'                 =>          $this->world->value(),
            'avatar'                =>          $this->avatar->value(),
            'avatarBlock'           =>          $this->avatarBlock->value(),
            'race_id'               =>          $this->race_id->value(),
            'rarity_id'             =>          $this->rarity_id->value(),
            'nature_id'             =>          $this->nature_id->value(),
            'type_id'               =>          $this->type_id->value(),
            'attack_min'            =>          $this->attack_min->value(),
            'attack_max'            =>          $this->attack_max->value(),
            'b_attack_min'          =>          $this->b_attack_min->value(),
            'b_Battack_max'         =>          $this->b_Battack_max->value(),
            'defense_min'           =>          $this->defense_min->value(),
            'defense_max'           =>          $this->defense_max->value(),
            'b_defense_min'         =>          $this->b_defense_min->value(),
            'b_defense_max'         =>          $this->b_defense_max->value(),
            'hp_min'                =>          $this->hp_min->value(),
            'hp_max'                =>          $this->hp_max->value(),
            'b_hp_min'              =>          $this->b_hp_min->value(),
            'b_hp_max'              =>          $this->b_hp_max->value(),
            'sp_attack_min'         =>          $this->sp_attack_min->value(),
            'sp_attack_max'         =>          $this->sp_attack_max->value(),
            'b_sp_attack_min'       =>          $this->b_sp_attack_min->value(),
            'b_sp_attack_max'       =>          $this->b_sp_attack_max->value(),
            'sp_defense_min'        =>          $this->sp_defense_min->value(),
            'sp_defense_max'        =>          $this->sp_defense_max->value(),
            'b_sp_defense_min'      =>          $this->b_sp_defense_min->value(),
            'b_sp_defense_max'      =>          $this->b_sp_defense_max->value(),
            'speed_min'             =>          $this->speed_min->value(),
            'speed_max'             =>          $this->speed_max->value(),
            'b_speed_min'           =>          $this->b_speed_min->value(),
            'b_speed_max'           =>          $this->b_speed_max->value(),
            'farming_min'           =>          $this->farming_min->value(),
            'farming_max'           =>          $this->farming_max->value(),
            'b_farming_min'         =>          $this->b_farming_min->value(),
            'b_farming_max'         =>          $this->b_farming_max->value(),
            'steeling_min'          =>          $this->steeling_min->value(),
            'steeling_max'          =>          $this->steeling_max->value(),
            'b_steeling_min'        =>          $this->b_steeling_min->value(),
            'b_steeling_max'        =>          $this->b_steeling_max->value(),
            'wooding_min'           =>          $this->wooding_min->value(),
            'wooding_max'           =>          $this->wooding_max->value(),
            'b_wooding_min'         =>          $this->b_wooding_min->value(),
            'b_wooding_max'         =>          $this->b_wooding_max->value(),
            'available'             =>          $this->available,
            'created_at'            =>          isset($created_at) ? $this->created_at->getTimestamp() : null,
            'updated_at'            =>          isset($updated_at) ? $this->updated_at->getTimestamp() : null,
            'created_by'            =>          isset($created_by) ? $this->created_by->value() : null,
            'updated_by'            =>          isset($updated_by) ? $this->updated_by->value() : null
        ];
    }


    //todos los getters y setters excepto los readOnly
    public function id(): ?AvailableHeroId
    {
        return $this->id;
    }

    public function name(): AvailableHeroName
    {
        return $this->name;
    }

    public function description(): AvailableHeroDescription
    {
        return $this->description;
    }

    public function world(): AvailableHeroWorld
    {
        return $this->world;
    }

    public function avatar(): Avatar
    {
        return $this->avatar;
    }

    public function avatarBlock(): Avatar
    {
        return $this->avatarBlock;
    }

    public function raceId(): FkId
    {
        return $this->race_id;
    }

    public function rarityId(): FkId
    {
        return $this->rarity_id;
    }

    public function natureId(): FkId
    {
        return $this->nature_id;
    }

    public function typeId(): FkId
    {
        return $this->type_id;
    }

    public function attackMin(): Stats
    {
        return $this->attack_min;
    }

    public function attackMax(): Stats
    {
        return $this->attack_max;
    }

    public function bAttackMin(): Boost
    {
        return $this->b_attack_min;
    }

    public function bAttackMax(): Boost
    {
        return $this->b_Battack_max;
    }

    public function defenseMin(): Stats
    {
        return $this->defense_min;
    }

    public function defenseMax(): Stats
    {
        return $this->defense_max;
    }

    public function bDefenseMin(): Boost
    {
        return $this->b_defense_min;
    }

    public function bDefenseMax(): Boost
    {
        return $this->b_defense_max;
    }

    public function hpMin(): Stats
    {
        return $this->hp_min;
    }

    public function hpMax(): Stats
    {
        return $this->hp_max;
    }

    public function bHpMin(): Boost
    {
        return $this->b_hp_min;
    }

    public function bHpMax(): Boost
    {
        return $this->b_hp_max;
    }

    public function spAttackMin(): Stats
    {
        return $this->sp_attack_min;
    }

    public function spAttackMax(): Stats
    {
        return $this->sp_attack_max;
    }

    public function bSpAttackMin(): Boost
    {
        return $this->b_sp_attack_min;
    }

    public function bSpAttackMax(): Boost
    {
        return $this->b_sp_attack_max;
    }

    public function spDefenseMin(): Stats
    {
        return $this->sp_defense_min;
    }

    public function spDefenseMax(): Stats
    {
        return $this->sp_defense_max;
    }

    public function bSpDefenseMin(): Boost
    {
        return $this->b_sp_defense_min;
    }

    public function bSpDefenseMax(): Boost
    {
        return $this->b_sp_defense_max;
    }

    public function speedMin(): Stats
    {
        return $this->speed_min;
    }

    public function speedMax(): Stats
    {
        return $this->speed_max;
    }

    public function bSpeedMin(): Boost
    {
        return $this->b_speed_min;
    }

    public function bSpeedMax(): Boost
    {
        return $this->b_speed_max;
    }

    public function farmingMin(): Stats
    {
        return $this->farming_min;
    }

    public function farmingMax(): Stats
    {
        return $this->farming_max;
    }

    public function bFarmingMin(): Boost
    {
        return $this->b_farming_min;
    }

    public function bFarmingMax(): Boost
    {
        return $this->b_farming_max;
    }

    public function steelingMin(): Stats
    {
        return $this->steeling_min;
    }

    public function steelingMax(): Stats
    {
        return $this->steeling_max;
    }

    public function bSteelingMin(): Boost
    {
        return $this->b_steeling_min;
    }

    public function bSteelingMax(): Boost
    {
        return $this->b_steeling_max;
    }

    public function woodingMin(): Stats
    {
        return $this->wooding_min;
    }

    public function woodingMax(): Stats
    {
        return $this->wooding_max;
    }

    public function bWoodingMin(): Boost
    {
        return $this->b_wooding_min;
    }

    public function bWoodingMax(): Boost
    {
        return $this->b_wooding_max;
    }

    public function available(): int
    {
        return $this->available;
    }

    public function createdAt(): ?DateTime
    {
        return $this->created_at;
    }

    public function updatedAt(): ?DateTime
    {
        return $this->updated_at;
    }

    public function createdBy(): ?UUID
    {
        return $this->created_by;
    }

    public function updatedBy(): ?UUID
    {
        return $this->updated_by;
    }
}