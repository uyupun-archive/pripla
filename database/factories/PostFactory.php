<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Prefecture;
use App\Models\Budget;
use App\Models\Target;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $prefectureLastId = Prefecture::orderBy('id', 'desc')->limit(1)->first()->id;
        $budgetLastId = Budget::orderBy('id', 'desc')->limit(1)->first()->id;
        $targetLastId = Target::orderBy('id', 'desc')->limit(1)->first()->id;

        return [
            'title'         => $this->faker->word,
            'prefecture_id' => rand(1, $prefectureLastId),
            'budget_id'     => rand(1, $budgetLastId),
            'target_id'     => rand(1, $targetLastId),
            'flow_chart'    => json_decode('[{"id": 2, "name": "集合", "type": 2, "children": []}, {"id": 3, "name": "解散", "type": 3, "children": []}]'),
        ];
    }
}
