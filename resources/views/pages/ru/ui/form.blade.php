<x-page title="Form elements" :sectionMenu="[
    'Разделы' => [
        ['url' => '#basics', 'label' => 'Основы'],
        ['url' => '#label', 'label' => 'Label'],
        ['url' => '#input', 'label' => 'Input'],
        ['url' => '#checkbox', 'label' => 'Checkbox'],
        ['url' => '#radio', 'label' => 'Radio'],
        ['url' => '#color', 'label' => 'Color'],
        ['url' => '#button', 'label' => 'Button'],
        ['url' => '#hint', 'label' => 'Hint'],
        ['url' => '#file', 'label' => 'File'],
        ['url' => '#slide-range', 'label' => 'Slide range'],
        ['url' => '#select', 'label' => 'Select'],
        ['url' => '#switcher', 'label' => 'Switcher'],
        ['url' => '#textarea', 'label' => 'Textarea'],
    ]
]">

<x-moonshine::alert type="default" icon="heroicons.information-circle" class="my-4">
    Компоненты форм являются оберткой аналогичных html-элементов, им можно передавать все необходимые атрибуты.
</x-moonshine::alert>

<x-sub-title id="basics">Основы</x-sub-title>

<x-p>
    Компонент <em>Form</em> является основой для построения форм.
</x-p>

<x-code language="blade" file="resources/views/examples/components/form/index.blade.php"></x-code>

<x-p>
    Компонент создает <code>html</code> разметку для будущей формы.
</x-p>

<x-code language="html">
<form
    class="form" method="POST"
    x-id="['form']"
    :id="$id('form')"
>
    @csrf <!-- [tl! focus:-5] -->

    // form elements

</form><!-- [tl! focus] -->
</x-code>

<x-moonshine::divider label="Buttons" />

<x-p>
    Компонент <em>Form</em> позволяет вынести кнопки в отдельный блок,
    для этого необходимо передать их в слоте <code>buttons</code>.
</x-p>

<x-code language="blade" file="resources/views/examples/components/form/index-buttons.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/index-buttons")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-moonshine::divider label="Вывод ошибок" />

<x-p>
    Параметр <code>errors</code> позволяет выводить список ошибок.
</x-p>

<x-code language="blade" file="resources/views/examples/components/form/index-error.blade.php"></x-code>

<x-p>
    Если на странице несколько форм, рекомендуется задать <code>name</code> у формы,
    для вывода ошибок только для конкретной формы.
</x-p>

<x-code language="blade" file="resources/views/examples/components/form/index-error-name.blade.php"></x-code>

<x-moonshine::divider label="Precognition" />

<x-p>
    Параметр <code>precognitive</code> позволяет включить у формы режим <em>Precognition</em>.
</x-p>

<x-code language="blade" file="resources/views/examples/components/form/index-precognitive.blade.php"></x-code>

<x-sub-title id="label">Label</x-sub-title>

<x-code language="blade" file="resources/views/examples/components/form/label.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/label")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-p>
    Если поле обязательно для заполнения, то можно передать атрибут <code>required</code> для стилизации элемента.
</x-p>

<x-code language="blade" file="resources/views/examples/components/form/label-required.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/label-required")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-sub-title id="input">Input</x-sub-title>

<x-code language="blade" file="resources/views/examples/components/form/input.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/input")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-sub-title id="checkbox">Checkbox</x-sub-title>

<x-code language="blade" file="resources/views/examples/components/form/checkbox.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/checkbox")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-sub-title id="radio">Radio</x-sub-title>

<x-code language="blade" file="resources/views/examples/components/form/radio.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/radio")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-sub-title id="color">Color</x-sub-title>

<x-code language="blade" file="resources/views/examples/components/form/color.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/color")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-sub-title id="button">Button</x-sub-title>

<x-code language="blade" file="resources/views/examples/components/form/button.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/button")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-sub-title id="hint">Hint</x-sub-title>

<x-code language="blade" file="resources/views/examples/components/form/hint.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/hint")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-sub-title id="file">File</x-sub-title>

<x-code language="blade" file="resources/views/examples/components/form/file.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="6">
        <x-moonshine::box>
            @include("examples/components/form/file")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-p>
    С помощью компонента можно отобразить ранее загруженные файлы.
</x-p>

<x-code language="blade" file="resources/views/examples/components/form/file-files.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="6">
        <x-moonshine::box>
            @include("examples/components/form/file-files")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-p>
    <x-moonshine::alert type="default" icon="heroicons.information-circle">
        <code>files</code> - массив url файлов для вывода<br>
        <code>raw</code> - массив исходных данных (значение сохраненное в базе данных).
    </x-moonshine::alert>
</x-p>

<x-p>
    Компоненту можно передать дополнительные параметры:
</x-p>
<x-p>
    <code>download</code> - скачивание загруженного файла <br>
    <code>removable</code> - удаление из списка загруженных файлов <br>
    <code>imageable</code> - отображение привью изображений
</x-p>

<x-code language="blade" file="resources/views/examples/components/form/file-full.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="6">
        <x-moonshine::box>
            @include("examples/components/form/file-full")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-sub-title id="slide-range">Slide range</x-sub-title>

<x-code language="blade" file="resources/views/examples/components/form/slide-range.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/slide-range")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-sub-title id="select">Select</x-sub-title>

<x-code language="blade" file="resources/views/examples/components/form/select.blade.php"></x-code>

<x-p>
    или через <code>slot:options</code>
</x-p>

<x-code language="blade" file="resources/views/examples/components/form/select-slot.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/select")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-p>
    Можно объединять значения в группы.
</x-p>

<x-code language="blade" file="resources/views/examples/components/form/select-groups.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/select-groups")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-p>
    Компоненту можно передать дополнительные параметры:
</x-p>
<x-p>
    <code>searchable</code> - поиск по значениям <br>
    <code>nullable</code> - может иметь значение <code>NULL</code>
</x-p>

<x-code language="blade" file="resources/views/examples/components/form/select-full.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/select-full")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-p>
    Для асинхронной загрузки значений необходимо атрибуту <code>asyncRoute</code> указать url,
    который вернет данные в формате json.
</x-p>

<x-code language="blade" file="resources/views/examples/components/form/select-async.blade.php"></x-code>

<x-sub-title id="switcher">Switcher</x-sub-title>

<x-code language="blade" file="resources/views/examples/components/form/switcher.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="4">
        <x-moonshine::box>
            @include("examples/components/form/switcher")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

<x-p>
    <code>onValue</code> - значение при активном состоянии<br>
    <code>offValue</code> - значение при неактивном состоянии
</x-p>

<x-sub-title id="textarea">Textarea</x-sub-title>

<x-code language="blade" file="resources/views/examples/components/form/textarea.blade.php"></x-code>

<x-moonshine::grid>
    <x-moonshine::column adaptiveColSpan="12" colSpan="6">
        <x-moonshine::box>
            @include("examples/components/form/textarea")
        </x-moonshine::box>
    </x-moonshine::column>
</x-moonshine::grid>

</x-page>
