<?php   

namespace api\Core\Guild\title\Domain\Repository;

use api\Core\Guild\title\Domain\GuildTitle;

interface IGuildTitleRepository
{
    public function get(int $titleId): ?GuildTitle;
}