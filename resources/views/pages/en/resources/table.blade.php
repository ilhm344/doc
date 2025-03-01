<x-page title="Table" :sectionMenu="[
    'Sections' => [
        ['url' => '#buttons', 'label' => 'Buttons'],
        ['url' => '#attributes', 'label' => 'Attributes'],
        ['url' => '#click', 'label' => 'Click Actions'],
        ['url' => '#simple-pagination', 'label' => 'Simple pagination'],
        ['url' => '#disable-pagination', 'label' => 'Disabling pagination'],
        ['url' => '#async', 'label' => 'Asynchronous mode'],
    ]
]">

<x-sub-title id="buttons">Buttons</x-sub-title>

<x-p>
    To add buttons to the table, use ActionButton and the <code>indexButtons</code> or <code>buttons</code> methods in the resource
</x-p>
<x-moonshine::alert type="default" icon="heroicons.information-circle">
    <x-link link="{{ route('moonshine.page', 'action_button') }}">More details ActionButton</x-link>
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
    An example of creating custom buttons for the index table in the section
    <x-link link="{{ route('moonshine.page', 'recipes') }}#custom-buttons">Recipes</x-link>
</x-moonshine::alert>

<x-p>
    For bulk actions you need to add the <code>bulk</code> method
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
    You can also use the <code>buttons</code> method, but in this case the buttons will be on all other pages of the resource
</x-p>

<x-code>
public function buttons(): array
{
    return [
        ActionButton::make('Link', '/endpoint'),
    ];
}
</x-code>

<x-sub-title id="attributes">Attributes</x-sub-title>

<x-p>
    Through model resources, it is possible to customize the data table <code>tr</code> and <code>td</code>.<br />
    To do this, you must use the appropriate <code>trAttributes()</code> and <code>tdAttributes()</code> methods,
    which need to pass a closure that returns attributes for the <x-link link="{{ route('moonshine.page', 'components-table') }}">table component</x-link>.
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

<x-sub-title id="click">Click Actions</x-sub-title>

<x-p>
    By default, nothing will happen when clicking tr, but you can change the behavior to
    go to edit, select or go to detailed view
</x-p>

<x-code>
    // Resource property
    // ClickAction::SELECT, ClickAction::DETAIL, ClickAction::EDIT

    protected ?ClickAction $clickAction = ClickAction::SELECT;
</x-code>

<x-sub-title id="simple-pagination">Simple pagination</x-sub-title>

<x-p>
    If you don't plan to display the total number of pages, use <code>Simple Pagination</code>.
    This will avoid additional queries for the total number of records in the database.
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

<x-sub-title id="disable-pagination">Disabling pagination</x-sub-title>

<x-p>
    If you don't plan to use pagination, you can turn it off.
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

<x-sub-title id="async">Asynchronous mode</x-sub-title>

<x-p>
    Switch mode without reboot for filtering, sorting and pagination
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
