@props(['name','type'=>'text','value'=>''])
<x-forms.input-wrapper>
    <x-forms.label :name="$name"></x-forms.label>
    <input id ="{{$name}}" type="{{$type}}" class="form-control" name="{{$name}}" value="{{old($name,$value)}}">
    <x-error :name="$name"/>
</x-forms.input-wrapper>