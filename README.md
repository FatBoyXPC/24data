# 24data JSON Test

### Steps To Run
1. Ensure you have PHP 7.2+ installed
2. Clone this repo
3. Move into the project diretory and run composer install
4. Use your preferred method to serve this project, I used `php -S localhost:8080 -t public/`

### Post Mortem
Given the test hinted to use an "MVC Structure" I was contemplating building a "DIY Framework" with [Plates], [Route], and [Container]. I've done this for legacy projects in the past and it worked out wonderfully, however, I'm a firm believer of [YAGNI] and the simplest solution always wins (especially in production). This is a project that doesn't need something overly complicated or overengineered, so I opted for a couple small classes and using PHP's HTML Friendly syntax.

[Plates]: http://platesphp.com
[Route]: http://route.thephpleague.com/
[Container]: http://container.thephpleague.com/
[YAGNI]: https://en.wikipedia.org/wiki/You_aren%27t_gonna_need_it
