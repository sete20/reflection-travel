@props(['placeholder'=>'Save','class'])
<div class="col-xs-12">
    <div class="text-center mt-5">
        <button type="submit" class="{{ $class ?? 'btn btn-primary' }}">
            {{ __($placeholder) }}
        </button>
    </div>
</div>
