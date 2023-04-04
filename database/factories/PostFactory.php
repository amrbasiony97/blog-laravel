<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();
        $titles = [
            'How to Protect Your Privacy Online',
            'The Top 10 Gadgets of 2023',
            'The Rise of Blockchain Technology: What You Need to Know',
            'How to Start a Podcast in 5 Easy Steps',
            'The Best Apps for Productivity and Organization',
            'How to Improve Your Running Performance and Avoid Injuries',
            'The Best Moments of the 2023 Olympics',
            'The Top 10 Soccer Players of All Time',
            'How to Play Golf Like a Pro',
            'The Benefits of Yoga for Athletes',
            'How to Study Effectively and Ace Your Exams',
            'The Best Online Courses to Learn New Skills in 2023',
            'The Future of Education: How Technology is Transforming Learning',
            'How to Write a Winning Scholarship Essay',
            'The Benefits of Reading for Your Brain and Mind',
            'How to Boost Your Immune System Naturally',
            'The Top 10 Health Trends of 2023',
            'The Best Exercises for Your Body Type',
            'How to Quit Smoking for Good',
            'The Benefits of Drinking Water for Your Health and Beauty'
        ];
        $descriptions = [
            'A practical guide for internet users who want to safeguard their personal data and online activity. Learn how to use encryption, VPNs, password managers, and other tools to keep your online identity secure.',
            'A review of the most innovative and useful gadgets that were released or announced in 2023, from smartwatches to drones. Find out what makes these gadgets stand out, how they work, and where to buy them.',
            'A comprehensive introduction to blockchain technology and its applications in various domains, such as finance, healthcare, and social media. Learn how blockchain works, why it matters, and what challenges it faces.',
            'A beginner-friendly guide for aspiring podcasters who want to share their voice and passion with the world. Learn how to choose a topic, record and edit your audio, distribute your podcast, and grow your audience.',
            'A curated list of the best apps that can help you get more done and stay organized in your personal and professional life. Learn how to use apps such as Evernote, Todoist, Trello, and more.',
            'A helpful guide for runners of all levels who want to improve their speed, endurance, and form. Learn how to warm up, cool down, stretch, and train properly. Plus, tips and advice on how to prevent and treat common running injuries.',
            'A recap of the most memorable and inspiring moments of the 2023 Olympics, from the opening ceremony to the closing ceremony. Relive the achievements, records, and stories of the athletes who competed in Tokyo.',
            'A ranking of the best soccer players in history, based on their skills, achievements, and legacy. Find out who made the list, why they deserve it, and how they influenced the game of soccer.',
            'A comprehensive guide for golfers who want to take their game to the next level. Learn how to master the fundamentals of golf, such as grip, stance, swing, and putt. Plus, tips and tricks on how to improve your mental game, strategy, and etiquette.',
            'A detailed overview of how yoga can benefit athletes of any sport, from improving flexibility and strength to reducing stress and inflammation. Learn how to incorporate yoga into your routine, what poses to do, and what precautions to take.',
            'A proven guide for students who want to improve their study habits and academic performance. Learn how to set goals, plan your time, take notes, review, and test yourself. Plus, tips and advice on how to deal with stress, anxiety, and procrastination.',
            'A curated list of the best online courses that can help you learn new skills or advance your career in 2023, from coding to photography. Find out what each course offers, how much it costs, and how to enroll.',
            'A fascinating exploration of how technology is changing the way we learn and teach, from artificial intelligence to virtual reality. Learn how technology can enhance learning outcomes, increase access and equity, and foster creativity and collaboration.',
            'A practical guide for students who want to apply for scholarships and increase their chances of getting accepted. Learn how to choose a topic, write a compelling essay, edit and proofread your work, and avoid common mistakes.',
            'A comprehensive overview of the scientific evidence behind reading and its effects on your brain and mind. Discover how reading can improve your memory, vocabulary, critical thinking, and emotional intelligence. Plus, tips and recommendations on what to read and how to read more.',
            'A helpful guide for anyone who wants to strengthen their immune system and prevent infections and diseases. Learn how to eat a balanced diet, get enough sleep, exercise regularly, and manage stress. Plus, tips and advice on what supplements and herbs to take and what to avoid.',
            'A review of the most popular and promising health trends that emerged or gained momentum in 2023, from intermittent fasting to CBD oil. Find out what each trend is, how it works, and what benefits and risks it has.',
            'A personalized guide for anyone who wants to find the best exercises for their body type and fitness goals. Learn how to identify your body type, what exercises suit you best, and how to optimize your results.',
            'A proven guide for smokers who want to quit smoking and live a healthier life. Learn how to prepare yourself mentally and physically, how to cope with withdrawal symptoms and cravings, and how to prevent relapse. Plus, tips and advice on what resources and support to use and what alternatives to try.',
            'A comprehensive overview of the scientific evidence behind drinking water and its effects on your health and beauty. Discover how drinking water can help you lose weight, detoxify your body, improve your skin, and more. Plus, tips and recommendations on how much water to drink and how to make it more enjoyable.'
        ];
        $index = rand(0, count($titles) - 1);

        return [
            'title' => $titles[$index],
            'description' => $descriptions[$index],
            'user_id' => $this->faker->randomElement($userIds)
        ];
    }
}
