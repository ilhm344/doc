<x-page title="Поиск" :sectionMenu="[
    'Разделы' => [
        ['url' => '#basics', 'label' => 'Основы'],
        ['url' => '#fulltext', 'label' => 'Полнотекстовый поиск'],
        ['url' => '#json', 'label' => 'Поиск по ключам json'],
        ['url' => '#relation', 'label' => 'Поиск по отношениям'],
        ['url' => '#global', 'label' => 'Глобальный поиск'],
    ]
]">

<x-sub-title id="basics">Основы</x-sub-title>

<x-p>
    Для поиска необходимо указать, какие поля модели будут участвовать в поиске.
    Для этого необходимо их перечислить в возвращаемом массиве в методе <code>search()</code>.
</x-p>

<x-moonshine::alert type="info" icon="heroicons.information-circle">
    Если метод возвращает пустой массив, то поисковая строка не будет отображаться.
</x-moonshine::alert>

<x-code language="php">
namespace App\MoonShine\Resources;

use App\Models\Post;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Posts';

    //...

    public function search(): array // [tl! focus:start]
    {
        return ['id', 'title', 'text'];
    } // [tl! focus:end]

    //...
}
</x-code>

<x-image theme="light" src="{{ asset('screenshots/search.png') }}"></x-image>
<x-image theme="dark" src="{{ asset('screenshots/search_dark.png') }}"></x-image>

<x-sub-title id="fulltext">Полнотекстовый поиск</x-sub-title>

<x-p>
    Если требуется fulltext поиск, то необходимо воспользоваться аттрибутом <code>MoonShine\Attributes\SearchUsingFullText</code>.
</x-p>

<x-code language="php">
namespace App\MoonShine\Resources;

use App\Models\Post;
use MoonShine\Attributes\SearchUsingFullText; // [tl! focus]
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Posts';

    //...

    #[SearchUsingFullText(['title', 'text'])] // [tl! focus]
    public function search(): array
    {
        return ['id'];
    }

    //...
}
</x-code>

<x-moonshine::alert type="default" icon="heroicons.information-circle">
    Не забудьте добавить fulltext индекс
</x-moonshine::alert>

<x-sub-title id="json">Поиск по ключам json</x-sub-title>

<x-p>
    Для полей <em>Json</em>, которые используются как ключ-значение <code>keyValue()</code>,
    можно указать какой ключ поля участвует в поиске.
</x-p>

<x-code language="php">
namespace App\MoonShine\Resources;

use App\Models\Post;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Posts';

    //...

    public function search(): array
    {
        return ['data->title']; // [tl! focus]
    }

    //...
}
</x-code>

<x-p>
    Для многомерных <em>Json</em>, которые формируются через поля <code>fields()</code>,
    ключ для поиска необходимо задавать следующим образом:
</x-p>

<x-code language="php">
namespace App\MoonShine\Resources;

use App\Models\Post;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Posts';

    //...

    public function search(): array
    {
        return ['data->[*]->title']; // [tl! focus]
    }

    //...
}
</x-code>

<x-sub-title id="relation">Поиск по отношениям</x-sub-title>

<x-p>
    Поиск можно осуществлять по отношениям, для этого необходимо указать по какому полю отношения производить поиск.
</x-p>

<x-code language="php">
namespace App\MoonShine\Resources;

use App\Models\Post;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Posts';

    //...

    public function search(): array
    {
        return ['category.title']; // [tl! focus]
    }

    //...
}
</x-code>

<x-sub-title id="global">Глобальный поиск</x-sub-title>

<x-p>
    В админ-панели <strong>MoonShine</strong> глобальный поиск можно реализовать на основе интеграции
    <x-link link="https://laravel.com/docs/scout" target="_blank">Laravel Scout</x-link>.
</x-p>

<x-p>
    Для реализации глобального поиска необходимо:
</x-p>

<x-moonshine::badge color="green">1</x-moonshine::badge> Указать перечень моделей для поиска
    в файле конфигурации <code>config/moonshine.php</code>.

<x-code language="php">
'global_search' => [
    Article::class,
    User::class
],
</x-code>

<x-moonshine::badge color="green">2</x-moonshine::badge> Реализовать интерфейс в моделях.

<x-code language="php">
use MoonShine\Scout\HasGlobalSearch;
use MoonShine\Scout\SearchableResponse;
use Laravel\Scout\Searchable;
use Laravel\Scout\Builder;

class Article extends Model implements HasGlobalSearch
{
    use Searchable;

    public function searchableQuery(Builder $builder): Builder
    {
        return $builder->take(4);
    }

    public function toSearchableResponse(): SearchableResponse
    {
        return new SearchableResponse(
            group: 'Articles',
            title: $this->title,
            url: '/',
            preview: $this->text,
            image: $this->thumbnail
        );
    }
}
</x-code>

</x-page>
