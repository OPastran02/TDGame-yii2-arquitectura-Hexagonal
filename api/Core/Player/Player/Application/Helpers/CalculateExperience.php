<?php   

declare(strict_types=1);

namespace api\Core\Player\Player\Application\Helpers;

class CalculateExperience
{
    private int $maxExperience;
    private int $experience;
    private int $newExperience;
    private int $level;

    public function __construct(int $level, int $experience, int $newExperience){
        $this->experience=$experience;
        $this->level=$level;
        $this->newExperience=$newExperience;
        $this->maxExperience=10000;
    }

    public function __invoke(){
        $arr=[];

        if (($this->experience + $this->newExperience) > $this->maxExperience){
            $arr["experience"] = ($this->experience + $this->newExperience) - $this->maxExperience;
            $arr["level"] = $this->level + 1;
            return $arr;
        }

        $arr["experience"] = $this->experience + $this->newExperience;
        $arr["level"] = $this->level;
        return $arr;
    }

}