<x-page title="Таблица" :sectionMenu="[
    'Разделы' => [
        ['url' => '#buttons', 'label' => 'Кнопки'],
        ['url' => '#attributes', 'label' => 'Атрибуты'],
        ['url' => '#click', 'label' => 'Действия по клику'],
        ['url' => '#simple-pagination', 'label' => 'Simple pagination'],
        ['url' => '#disable-pagination', 'label' => 'Отключение пагинации'],
        ['url' => '#async', 'label' => 'Асинхронный режим'],
    ]
]">

<x-sub-title id="buttons">Кнопки</x-sub-title>

<x-p>
    Для добавления кнопок в таблицу используются ActionButton и методы <code>indexButtons</code> или <code>buttons</code> в ресурсе
</x-p>
<x-moonshine::alert type="default" icon="heroicons.information-circle">
    <x-link link="{{ route('moonshine.page', 'action_button') }}">Подробнее ActionButton</x-link>
</x-moonshine::alert>

<x-code>
public function indexButtons(): array
{
    return [
        ActionButton::make('Link', '/endpoint'),
    ];
}
</x-code>

<x-moonshine::alert type="primary" icon="heroicons.outline.book-open">
    Пример создания кастомных кнопок у индексной таблицы в разделе
    <x-link link="{{ route('moonshine.page', 'recipes') }}#custom-buttons">Recipes</x-link>
</x-moonshine::alert>

<x-p>
    Для массовых действий необходимо добавить метод <code>bulk</code>
</x-p>

<x-code>
public function indexButtons(): array
{
    return [
        ActionButton::make('Link', '/endpoint')->bulk(),
    ];
}
</x-code>

<x-p>
    Также можно воспользоваться методом <code>buttons</code>, но в таком случае кнопки будут и на всех остальных страницах ресурса
</x-p>

<x-code>
public function buttons(): array
{
    return [
        ActionButton::make('Link', '/endpoint'),
    ];
}
</x-code>

<x-sub-title id="attributes">Атрибуты</x-sub-title>

<x-p>
    Через ресурсы модели есть возможность кастомизировать <code>tr</code> и <code>td</code> у таблицы с данными.<br />
    Для это необходимо использовать соответствующие методы <code>trAttributes()</code> и <code>tdAttributes()</code>,
    которым нужно передать замыкание, возвращающее атрибуты для <x-link link="{{ route('moonshine.page', 'components-table') }}">компонента таблица</x-link>.
</x-p>

<x-code language="php">
namespace App\MoonShine\Resources;

use App\Models\Post;
use Closure;
use Illuminate\View\ComponentAttributeBag;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;

class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Posts';

    //...

    public function trAttributes(): Closure // [tl! focus:start]
    {
        return function (
            Model $item,
            int $row,
            ComponentAttributeBag $attr
        ): ComponentAttributeBag {
            if ($item->id === 1 | $row === 2) {
                $attr->setAttributes([
                    'class' => 'bgc-green'
                ]);
            }

            return $attr;
        };
    } // [tl! focus:end]

    public function tdAttributes(): Closure // [tl! focus:start]
    {
        return function (
            Model $item,
            int $row,
            int $cell,
            ComponentAttributeBag $attr = null
        ): ComponentAttributeBag {
            if ($cell === 6) {
                $attr->setAttributes([
                    'class' => 'bgc-red'
                ]);
            }

            return $attr;
        };
    } // [tl! focus:end]

    //...
}
</x-code>

<x-image theme="light" src="{{ asset('screenshots/table_class.png') }}"></x-image>
<x-image theme="dark" src="{{ asset('screenshots/table_class_dark.png') }}"></x-image>

<x-sub-title id="click">Действия по клику</x-sub-title>

<x-p>
    По умолчанию на клик по tr ничего не произойдет, но можно изменить поведение на
    переход в редактирование, выбор или переход к детальному просмотру
</x-p>

<x-code>
    // Свойство ресурса
    // ClickAction::SELECT, ClickAction::DETAIL, ClickAction::EDIT

    protected ?ClickAction $clickAction = ClickAction::SELECT;
</x-code>

<x-sub-title id="simple-pagination">Simple pagination</x-sub-title>

<x-p>
    Если вы не планируете отображать общее количество страниц, воспользуйтесь <code>Simple Pagination</code>.
    Это позволит избежать дополнительных запросов на общее количество записей в базе данных.
</x-p>

<x-code language="php">
namespace App\MoonShine\Resources;

use App\Models\Post;
use MoonShine\Resources\ModelResource;

class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Posts';

    protected bool $simplePaginate = true; // [tl! focus]

    // ...
}
</x-code>

<x-image theme="light" src="{{ asset('screenshots/resource_simple_paginate.png') }}"></x-image>
<x-image theme="dark" src="{{ asset('screenshots/resource_simple_paginate_dark.png') }}"></x-image>

<x-sub-title id="disable-pagination">Отключение пагинации</x-sub-title>

<x-p>
    Если вы не планируете использовать разбиение на страницы, то его можно отключить.
</x-p>

<x-code language="php">
namespace App\MoonShine\Resources;

use App\Models\Post;
use MoonShine\Resources\ModelResource;

class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Posts';

    protected bool $usePagination = false; // [tl! focus]

    // ...
}
</x-code>

<x-sub-title id="async">Асинхронный режим</x-sub-title>

<x-p>
    Переключить режим без перезагрузки для фильтрации, сортировки и пагинации
</x-p>

<x-code>
namespace App\MoonShine\Resources;

use App\Models\Post;
use MoonShine\Resources\ModelResource;

class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Posts';

    protected bool $isAsync = true; // [tl! focus]

    // ...
}
</x-code>

</x-page>
