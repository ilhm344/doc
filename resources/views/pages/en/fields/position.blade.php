<x-page title="Position">

<x-extendby :href="route('moonshine.page', 'fields-preview')">
    Preview
</x-extendby>

<x-p>
    The <em>Position</em> field allows you to create numbering for iterating elements.
</x-p>

<x-code language="php">
use MoonShine\Fields\Json;
use MoonShine\Fields\Position; // [tl! focus]
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;

//...

public function fields(): array
{
    return [
        Json::make('Product Options', 'options')
            ->fields([
                Position::make(), // [tl! focus]
                Text::make('Title'),
                Text::make('Value'),
                Switcher::make('Active')
            ])
    ];
}

//...
</x-code>

<x-image theme="light" src="{{ asset('screenshots/json_fields.png') }}"></x-image>
<x-image theme="dark" src="{{ asset('screenshots/json_fields_dark.png') }}"></x-image>

</x-page>
