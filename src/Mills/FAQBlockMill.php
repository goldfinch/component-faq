<?php

namespace Goldfinch\Component\FAQ\Mills;

use Goldfinch\Mill\Mill;

class FAQBlockMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
        ];
    }
}
