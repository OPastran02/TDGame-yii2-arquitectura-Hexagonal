<?php   

namespace api\Core\General\Membership\Domain\Repository;

use api\Core\General\Membership\Domain\Membership;
use api\Core\General\Membership\Domain\Memberships;

interface IMembershipRepository
{
    public function get(string $membershipId): ?Membership;
    public function getAllbyGuildId(string $guildId): ?Membership;
    public function create($membership): ?Membership;
    public function guildRequest($membership): ?Membership;
    public function addDamage($membership): ?Membership;
}